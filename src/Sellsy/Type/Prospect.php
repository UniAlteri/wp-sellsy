<?php

namespace UniAlteri\Sellsy\Wordpress\Type;

use UniAlteri\Sellsy\Wordpress\Form\CustomField;

class Prospect implements TypeInterface
{
    /**
     * Correspondence between fields in form and sellsy api
     */
    protected $fieldsCorrespondence = [
        'thirdName' => ['third.name','contact.name'],
        'thirdType' => 'third.type',
        'thirdEmail' => ['third.email','contact.email'],
        'thirdTel' => ['third.tel','contact.tel'],
        'thirdFax' => ['third.fax','contact.fax'],
        'thirdMobile' => ['third.mobile','contact.mobile'],
        'thirdWeb' => 'third.web',
        'thirdSiret' => 'third.siret',
        'thirdVat' => 'third.vat',
        'thirdRcs' => 'third.rcs',
        'thirdApenaf' => 'third.apenaf',
        'thirdCapital' => 'third.capital',
        'thirdTags' => 'third.tags',
        'thirdAccountingcode' => 'third.accountingcode',
        'thirdAuxcode' => 'third.auxcode',
        'thirdStickyNote' => 'third.stickyNote',
        'contactName' => ['third.name','contact.name'],
        'contactForename' => 'contact.forename',
        'contactEmail' => ['third.email','contact.email'],
        'contactTel' => ['third.tel','contact.tel'],
        'contactFax' => ['third.fax','contact.fax'],
        'contactMobile' => ['third.mobile','contact.mobile'],
        'contactPosition' => 'contact.position',
        'addressName' => 'address.name',
        'addressPart1' => 'address.part1',
        'addressPart2' => 'address.part2',
        'addressZip' => 'address.zip',
        'addressTown' => 'address.town',
        'addressCountrycode' => 'address.countrycode'
    ];

    /**
     * Correspondence between fields and field value
     */
    protected $fieldsName = [];

    /**
     * Initialize
     */
    public function __construct()
    {
        $this->fieldsName = [
            'thirdName' => [
                'type' => 'text',
                'name' => __('Nom ou Raison sociale','wpsellsy'),
                'code' => 'thirdName',
                'description' => __('Nom ou Raison sociale','wpsellsy'),
                'defaultValue' => '',
                'prefsList' => null
            ],
            'thirdEmail' => [
                'type' => 'text',
                'name' => __('Email du prospect','wpsellsy'),
                'code' => 'thirdEmail',
                'description' => __('Email du prospect','wpsellsy'),
                'defaultValue' => '',
                'prefsList' => null
            ],
            'thirdTel' => [
                'type' => 'text',
                'name' => __('Téléphone','wpsellsy'),
                'code' => 'thirdTel',
                'description' => __('Téléphone','wpsellsy'),
                'defaultValue' => '',
                'prefsList' => null
            ],
            'thirdMobile' => [
                'type' => 'text',
                'name' => __('Téléhone portable','wpsellsy'),
                'code' => 'thirdMobile',
                'description' => __('Téléhone portable','wpsellsy'),
                'defaultValue' => '',
                'prefsList' => null
            ],
            'thirdWeb' => [
                'type' => 'text',
                'name' => __('Site web','wpsellsy'),
                'code' => 'thirdWeb',
                'description' => __('Site web','wpsellsy'),
                'defaultValue' => '',
                'prefsList' => null
            ],
            'contactName' => [
                'type' => 'text',
                'name' => __('Nom','wpsellsy'),
                'code' => 'contactName',
                'description' => __('Nom','wpsellsy'),
                'defaultValue' => '',
                'prefsList' => null
            ],
            'contactForename' => [
                'type' => 'text',
                'name' => __('Prénom','wpsellsy'),
                'code' => 'contactForename',
                'description' => __('Prénom','wpsellsy'),
                'defaultValue' => '',
                'prefsList' => null
            ],
            'contactEmail' => [
                'type' => 'text',
                'name' => __('Email','wpsellsy'),
                'code' => 'contactEmail',
                'description' => __('Email','wpsellsy'),
                'defaultValue' => '',
                'prefsList' => null
            ],
            'contactTel' => [
                'type' => 'text',
                'name' => __('Téléphone','wpsellsy'),
                'code' => 'contactTel',
                'description' => __('Téléphone','wpsellsy'),
                'defaultValue' => '',
                'prefsList' => null
            ],
            'contactMobile' => [
                'type' => 'text',
                'name' => __('Mobile','wpsellsy'),
                'code' => 'contactMobile',
                'description' => __('Mobile','wpsellsy'),
                'defaultValue' => '',
                'prefsList' => null
            ],
            'addressName' => [
                'type' => 'text',
                'name' => __('Adresse 1','wpsellsy'),
                'code' => 'addressName',
                'description' => __('Adresse 1','wpsellsy'),
                'defaultValue' => '',
                'prefsList' => null
            ],
            'addressPart1' => [
                'type' => 'text',
                'name' => __('Adresse 2','wpsellsy'),
                'code' => 'addressPart1',
                'description' => __('Adresse 2','wpsellsy'),
                'defaultValue' => '',
                'prefsList' => null
            ],
            'addressPart2' => [
                'type' => 'text',
                'name' => __('Adresse 3','wpsellsy'),
                'code' => 'addressPart2',
                'description' => __('Adresse 3','wpsellsy'),
                'defaultValue' => '',
                'prefsList' => null
            ],
            'addressZip' => [
                'type' => 'text',
                'name' => __('Code postale','wpsellsy'),
                'code' => 'addressZip',
                'description' => __('Code postale','wpsellsy'),
                'defaultValue' => '',
                'prefsList' => null
            ],
            'addressTown' => [
                'type' => 'text',
                'name' => __('Ville','wpsellsy'),
                'code' => 'addressTown',
                'description' => __('Ville','wpsellsy'),
                'defaultValue' => '',
                'prefsList' => null
            ],
            'addressCountrycode' => [
                'type' => 'text',
                'name' => __('Pays','wpsellsy'),
                'code' => 'addressCountrycode',
                'description' => __('Pays','wpsellsy'),
                'defaultValue' => '',
                'prefsList' => null
            ]
        ];
    }

    /**
     * @return CustomField[]
     */
    public function getStandardFields()
    {
        //Add default prospect fields
        $final = array();
        foreach ($this->fieldsName as $fieldName=>$fieldParams) {
            $final[$fieldName] = new CustomField(
                $fieldName,
                $fieldParams['type'],
                $fieldParams['name'],
                $fieldParams['code'],
                $fieldParams['description'],
                $fieldParams['defaultValue'],
                $fieldParams['prefsList']
            );
        }

        return $final;
    }

    /**
     * @param string $fieldName
     * @param mixed $value
     * @param array $finalSource
     */
    public function populateParams($fieldName, &$value, &$finalSource)
    {
        if (isset($this->fieldsCorrespondence[$fieldName])) {
            foreach ((array) $this->fieldsCorrespondence[$fieldName] as $apiPath) {
                $path = explode('.', $apiPath);

                if (count($path) == 2) {
                    $finalSource[$path[0]][$path[1]] = $value;
                }
            }
        }
    }

    /**
     * @param string $fieldName
     * @param mixed $value
     * @return boolean
     * @throws \Exception
     */
    public function validateField($fieldName, &$value)
    {
        // TODO: Implement validateField() method.
    }
}