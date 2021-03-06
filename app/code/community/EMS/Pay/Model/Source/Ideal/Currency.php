<?php

class EMS_Pay_Model_Source_Ideal_Currency extends EMS_Pay_Model_Source_Currency
{
    /**
     * @inheritdoc
     */
    public function toOptionArray($isMultiselect)
    {
        $currency = Mage::getSingleton('ems_pay/currency');
        $options = parent::toOptionArray($isMultiselect);
        foreach ($options as $index => $optionData) {
            $value = $optionData['value'];
            if ($value !== '' && !$currency->isCurrencySupportedByIdeal($value)) {
                unset($options[$index]);
            }
        }

        return $options;
    }
}
