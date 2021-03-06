<?php

namespace App\DataFixtures;

use App\Entity\Application;
use App\Entity\Image;
use App\Entity\Organization;
use App\Entity\Style;
use Conduction\CommonGroundBundle\Service\CommonGroundService;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Ramsey\Uuid\Uuid;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class CommongroundFixtures extends Fixture
{
    private $params;
    /**
     * @var CommonGroundService
     */
    private $commonGroundService;

    public const ORGANIZATION_CONDUCTION = 'organization-conduction';

    public function __construct(ParameterBagInterface $params, CommonGroundService $commonGroundService)
    {
        $this->params = $params;
        $this->commonGroundService = $commonGroundService;
    }

    public function load(ObjectManager $manager)
    {
        // Lets make sure we only run these fixtures on larping enviroment
        if (
            !$this->params->get('app_build_all_fixtures') &&
            $this->params->get('app_domain') != 'commonground.nu' && strpos($this->params->get('app_domain'), 'commonground.nu') == false &&
            $this->params->get('app_domain') != 'id-vault.com' && strpos($this->params->get('app_domain'), 'id-vault.com') == false &&
            $this->params->get('app_domain') != 'zuid-drecht.nl' && strpos($this->params->get('app_domain'), 'zuid-drecht.nl') == false) {
            return false;
        }
        //var_dump($this->params->get('app_domain'));

        // Deze organisaties worden ook buiten het wrc gebruikt
        $id = Uuid::fromString('073741b3-f756-4767-aa5d-240f167ca89d');
        $conduction = new Organization();
        $conduction->setName('Conduction');
        $conduction->setDescription('Conduction');
        $conduction->setRsin('');
        $conduction->setContact($this->commonGroundService->cleanUrl(['component'=>'cc', 'type'=>'organizations', 'id'=>'9650a44d-d7d1-454a-ab4f-2338c90e8c2f']));
        $manager->persist($conduction);
        $conduction->setId($id);
        $manager->persist($conduction);
        $manager->flush();
        $conduction = $manager->getRepository('App:Organization')->findOneBy(['id'=> $id]);

        $id = Uuid::fromString('72af550e-31a2-4b44-8e5f-289565c07366');
        $favicon = new Image();
        $favicon->setName('commonground nu favicon');
        $favicon->setDescription('commonground nu Favicon');
        $favicon->setBase64('data:image/png;base64,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');
        $favicon->setOrganization($conduction);
        $manager->persist($favicon);
        $favicon->setId($id);
        $manager->persist($favicon);
        $manager->flush();
        $favicon = $manager->getRepository('App:Image')->findOneBy(['id'=> $id]);

        $style = new Style();
        $style->setName('commonground nu style');
        $style->setDescription('Huistlijl commonground nu');
        $style->setCss('
        :root {
                --primary: #01689b;
                --primary-color: white;
                --background: #01689b;
                --secondary: #cce0f1;
                --secondary-color: #2b2b2b;

                --menu: #01689b;
                --menu-over: #3669A5;
                --menu-color: white;
                --footer: #01689b;
                --footer-color: white;
         }

         body {
            background-color: #4376FB !important;
            font-family: "Nunito Sans", sans-serif;
            color: white;
         }

        ');
        $style->setfavicon($favicon);
        $style->addOrganization($conduction);
        $manager->persist($style);
        $manager->flush();

        // Website applicatie
        $id = Uuid::fromString('7d19fbc6-6c35-4087-ab10-9778277cefe1');
        $website = new Application();
        $website->setName('Commonground.nu');
        $website->setDescription('Commonground.nu applicatie');
        $website->setDomain('commonground.nu');
        $website->setOrganization($conduction);
        $website->setStyle($style);
        $manager->persist($website);
        $website->setId($id);
        $manager->persist($website);
        $manager->flush();
        $website = $manager->getRepository('App:Application')->findOneBy(['id'=> $id]);
    }
}
