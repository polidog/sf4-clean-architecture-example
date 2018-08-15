<?php declare(strict_types=1);

namespace App\Form\Type;


use Polidog\TransferMoneyManagement\UseCase\TransferMoney\Input;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TransferMoneyInputType extends AbstractType
{
    private const SOURCE_NUMBER = 'sourceNumber';
    private const DESTINATION_NUMBER = 'destinationNumber';
    private const MONEY = 'money';

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(self::SOURCE_NUMBER, TextType::class,[
                'label' => '送金元番号',
            ])
            ->add(self::DESTINATION_NUMBER, TextType::class,[
                'label' => '送金先番号',
            ])
            ->add(self::MONEY, IntegerType::class, [
                'label' => '金額'
            ])
        ;

        $builder->addModelTransformer(new CallbackTransformer(function(Input $data = null){
            if ($data === null) {
                return [];
            }

            return [
                self::SOURCE_NUMBER => $data->getSourceNumber(),
                self::DESTINATION_NUMBER => $data->getDestinationNumber(),
                self::MONEY => $data->getMoney(),
            ];
        }, function (array $data){
            return new Input($data[self::SOURCE_NUMBER], $data[self::DESTINATION_NUMBER], $data[self::MONEY]);
        }));

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(['translation_domain' => false]);
    }


}