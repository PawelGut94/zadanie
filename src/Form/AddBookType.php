<?php

namespace App\Form;

use App\Entity\Book;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class AddBookType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'form.book.title',
                'attr' => ['class' => 'form-control'],
                'required' => true,
            ])
            ->add('author', TextType::class, [
                'label' => 'form.book.author',
                'attr' => ['class' => 'form-control'],
                'required' => true,
            ])
            ->add('publicationDate', DateType::class, [
                'label' => 'form.book.publicationDate',
                'widget' => 'single_text',
                'attr' => ['class' => 'form-control'],
                'required' => true,
            ])
            ->add('isbn', TextType::class, [
                'label' => 'form.book.isbn',
                'help' => 'form.book.isbnHelp',
                'attr' => ['class' => 'form-control'],
                'required' => true,
            ])
            ->add('price', NumberType::class, [
                'label' => 'form.book.price',
                'attr' => ['class' => 'form-control'],
                'required' => true,
            ])
            ->add('description', TextType::class, [
                'label' => 'form.book.description',
                'attr' => ['class' => 'form-control'],
                'required' => true,
            ])
            ->add('urlPictureWithBookCover', UrlType::class, [
                'label' => 'form.book.urlPictureWithBookCover',
                'attr' => ['class' => 'form-control'],
                'required' => true,
            ])
            ->add('status', ChoiceType::class, [
                'label' => 'form.book.status',
                'choices'  => [
                    'form.book.available' => true,
                    'form.book.unavailable' => false,
                ],
                'attr' => ['class' => 'form-control'],
                'required' => true,
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Dodaj ksiązkę',
                'attr' => ['class' => 'btn btn-success']
            ]);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Book::class,
        ]);
    }

    public function getBlockPrefix()
    {
        return 'app_add_book';
    }
}