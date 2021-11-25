<?php
namespace App\Admin\Field;

use EasyCorp\Bundle\EasyAdminBundle\Contracts\Field\FieldInterface;
use EasyCorp\Bundle\EasyAdminBundle\Field\FieldTrait;
use libphonenumber\PhoneNumberFormat;
use Misd\PhoneNumberBundle\Form\Type\PhoneNumberType;

final class PhoneNumberField implements FieldInterface
{
    use FieldTrait;

    /**
     * @param string|false|null $label
     */
    public static function new(string $propertyName, $label = null): self
    {
        return (new self())
            ->setProperty($propertyName)
            ->setLabel($label)

            // this template is used in 'index' and 'detail' pages
            ->setTemplatePath('admin/fields/phone_number.html.twig')

            ->setColumns('col-md-6 col-xxl-5')

            // this is used in 'edit' and 'new' pages to edit the field contents
            // you can use your own form types too
            ->setFormType(PhoneNumberType::class)
            ->setFormTypeOption('format', PhoneNumberFormat::NATIONAL)
            ->setFormTypeOption('widget', PhoneNumberType::WIDGET_COUNTRY_CHOICE)
            ->setFormTypeOption('preferred_country_choices', ['AT'])
            ->setFormTypeOption('country_options', [
                'label_attr' => ['style' => 'display: none;'],
            ])
            ->setFormTypeOption('number_options', [
                'label_attr' => ['style' => 'display: none;'],
            ])
            ->addCssClass('phone-number')

            // loads the CSS and JS assets associated to the given Webpack Encore entry
            // in any CRUD page (index/detail/edit/new). It's equivalent to calling
            // encore_entry_link_tags('...') and encore_entry_script_tags('...')
            //->addWebpackEncoreEntries('admin-field-map')

            // these methods allow to define the web assets loaded when the
            // field is displayed in any CRUD page (index/detail/edit/new)
            //->addCssFiles('js/admin/field-map.css')
            //->addJsFiles('js/admin/field-map.js')
            ;
    }
}