<?php

namespace Ovski\ToolsBundle\Tools;

use Symfony\Component\DomCrawler\Crawler;

/**
 * Class ItemFixturesGenerator
 *
 * @author:  Baptiste BOUCHEREAU <baptiste.bouchereau@gmail.com>
 */
class ItemFixturesGenerator
{
    /**
     * Generate a file with fixtures for the OvskiMinecraftStatsBundle\Item entity
     * 
     * @param type $filePath
     * @return string
     */
    public static function generateFile($filePath)
    {
        $html = file_get_contents('http://jd.bukkit.org/rb/apidocs/org/bukkit/Material.html');
        $crawler = new Crawler($html);

        $crawler = $crawler->filter("table")->eq(2); // skip the first table of the page
        $items = $crawler->filter("tr.TableRowColor");
        $php = self::getHeadContent();

        foreach ($items as $item) {
            $link = $item->getElementsByTagName('a')->item(0);
            $itemVariableName = self::getItemVariableName($link->nodeValue);
            $itemId = self::getItemId($link->nodeValue);

            $instanciationLine  = sprintf("        $%s = new Item();\n", $itemVariableName);
            $setIdLine          = sprintf("        $%s->setId(\"%s\");\n", $itemVariableName, $itemId);
            $setKillAbilityLine = sprintf("        $%s->setKillAbility(0);\n", $itemVariableName);
            $persistLine        = sprintf("        \$manager->persist($%s);\n\n", $itemVariableName);

            $phpItem = sprintf("%s%s%s%s", $instanciationLine, $setIdLine, $setKillAbilityLine, $persistLine);
            $php = sprintf("%s%s", $php, $phpItem);

        }

        $php = sprintf("%s%s", $php, self::getFootContent());

        file_put_contents($filePath, $php);

        return sprintf("%s was just generated", $filePath);
    }

    /**
     * Get a formatted item name for a variable
     * Ex: WOOD_BED_ROCK -> woodBedRock;
     * 
     * @param string $itemText
     * @return string
     */
    private static function getItemVariableName($itemText)
    {
        $itemText = strtolower($itemText);
        $pieces = explode("_", $itemText);
        $wordNumber = count($pieces);
        if ($wordNumber < 2) {
            return $itemText;
        } else {
            for ($i=1; $i < $wordNumber; $i++) {
                $pieces[$i] = ucfirst($pieces[$i]);
            }

            return implode("", $pieces);
        }
    }

    /**
     * Get the id of an item
     * 
     * @param string $itemText
     * @return string
     */
    private static function getItemId($itemText)
    {
        return strtolower($itemText);
    }

    /**
     * Get the head content for the item fixtures file
     * 
     * @return string
     */
    private static function getHeadContent()
    {
        return file_get_contents(__DIR__.'/../Resources/Fixtures/itemFixturesHeadContent.txt');
    }

    /**
     * Get the foot content for the item fixtures file
     * 
     * @return string
     */
    private static function getFootContent()
    {
        return file_get_contents(__DIR__.'/../Resources/Fixtures/itemFixturesFootContent.txt');
    }
}
