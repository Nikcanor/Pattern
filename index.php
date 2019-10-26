<?php
interface WebsiteInterface
{
    public function getPrice();
    public function getDescription();
}
 
 
/** This is the base website 'service', it does not accept a WebsiteInterface object in it's constructor */
class BaseWebsite implements WebsiteInterface
{
    public function getPrice()
    {
        return 1000;
    }
    public function getDescription()
    {
        return "    A barebones website";
    }
}
 
/** But this (and all others below it) expect a WebsiteInterface object in it's constructor */
class CustomDesign implements WebsiteInterface
{
    protected $website;
    public function __construct(WebsiteInterface $website)
    {
        $this->website = $website;
    }
    public function getPrice()
    {
        return 2000 + $this->website->getPrice();
    }
    public function getDescription()
    {
        return $this->website->getDescription() . ",\n    and a completely custom design, designed by an in-house designer";
    }
}
 
class WordPressBlog implements WebsiteInterface
{
    protected $website;
    public function __construct(WebsiteInterface $website)
    {
        $this->website = $website;
    }
    public function getPrice()
    {
        return 750 + $this->website->getPrice();
    }
    public function getDescription()
    {
        return $this->website->getDescription() . ",\n    and setting everything up with a WordPress blog";
    }
}
 
class ContactForm implements WebsiteInterface
{
    protected $website;
    public function __construct(WebsiteInterface $website)
    {
        $this->website = $website;
    }
    public function getPrice()
    {
        return 150 + $this->website->getPrice();
    }
    public function getDescription()
    {
        return $this->website->getDescription() . ",\n    and adding a contact form";
    }
}
 
 
class YearHosting implements WebsiteInterface
{
    protected $website;
    public function __construct(WebsiteInterface $website)
    {
        $this->website = $website;
    }
 
    public function getPrice()
    {
        return (12 * 30) + $this->website->getPrice();
    }
 
    public function getDescription()
    {
        return $this->website->getDescription() . ",\n    including a year's hosting";
    }
}
 
// basic website:
 
// Let's see the price / desc of the basic website. This is just like a normal bit of code:
echo "=== BASIC WEBSITE ===\n";
$basic_website = new BaseWebsite();
echo "Cost: " . $basic_website->getPrice() . "\n";
echo "Description of all included services: \n" . $basic_website->getDescription() . "\n";
 
 echo "<hr>";

// but now, let's say we want to get the price of a website with a custom design. Here is how we can get it all working:
echo "=== BASIC WEBSITE + CUSTOM DESIGN  ===\n";
$basic_and_custom_design = new CustomDesign(new BaseWebsite());

echo "Cost: " . $basic_and_custom_design->getPrice() . "\n";

echo "Description of all included services: \n" . $basic_and_custom_design->getDescription() . "\n";
  echo "<hr>";
echo "=== BASIC WEBSITE + CUSTOM DESIGN + WP + CONTACT FORM + HOSTING FOR A YEAR ===\n";

$basic_and_custom_design = new YearHosting(new ContactForm(new WordPressBlog(new CustomDesign(new BaseWebsite()))));
echo "Cost: " . $basic_and_custom_design->getPrice() . "\n";
echo "Description of all included services: \n" . $basic_and_custom_design->getDescription() . "\n";