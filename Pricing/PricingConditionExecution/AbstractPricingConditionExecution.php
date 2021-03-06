<?php

namespace Xerias\AssetBookingBundle\Pricing\PricingConditionExecution;

 abstract class AbstractPricingConditionExecution {

	protected $pricingCondition;
	protected $pricingContextContainer;
	protected $serviceContainer;
	protected $priceConditionParameters;

  	public function AbstractPricingConditionExecution(&$pricingCondition, &$pricingContextContainer, &$serviceContainer){
	
		$this->pricingCondition = $pricingCondition;
		$this->pricingContextContainer = $pricingContextContainer;
		$this->serviceContainer = $serviceContainer;
        $this->priceConditionParameters = unserialize($pricingCondition->getParameters());
	
    }


	abstract public function execute();

    protected function get($serviceId){
        return $this->serviceContainer->get($serviceId);
    }
     
    protected function getParameter($name){
        if(array_key_exists($name, $this->priceConditionParameters)){
            return $this->priceConditionParameters[$name];

        }
    }
}
