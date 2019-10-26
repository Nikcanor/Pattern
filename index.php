<?php
interface WebInterface
{
    public function getPrice();
    public function getDescription();
}
 
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
        return $this->website->getDescription() . ",\n    și un design complet personalizat, proiectat de un designer intern";
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
        return $this->website->getDescription() . ",\n    și setând totul cu un blog WordPress";
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
        return $this->website->getDescription() . ",\n    și adăugarea unui formular de contact";
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
        return $this->website->getDescription() . ",\n   inclusiv găzduirea unui an";
    }
}
 
// basic website:
 
echo "=== BASIC WEBSITE ===\n";
$basic_website = new BaseWebsite();
echo "Cost: " . $basic_website->getPrice() . "\n";
echo "Description of all included services: \n" . $basic_website->getDescription() . "\n";
 
 echo "<hr>";

echo " WEBSITE + DESIGN  ===\n";
$basic_and_custom_design = new CustomDesign(new BaseWebsite());

echo "Cost: " . $basic_and_custom_design->getPrice() . "\n";

echo "Descrierea tuturor serviciilor incluse: \n" . $basic_and_custom_design->getDescription() . "\n";
  echo "<hr>";
echo "BASIC WEBSITE + DESIGN + WP + CONTACT FORM + HOSTING FOR A YEAR ===\n";

$basic_and_custom_design = new YearHosting(new ContactForm(new WordPressBlog(new CustomDesign(new BaseWebsite()))));
echo "Cost: " . $basic_and_custom_design->getPrice() . "\n";
echo "Description of all included services: \n" . $basic_and_custom_design->getDescription() . "\n";
