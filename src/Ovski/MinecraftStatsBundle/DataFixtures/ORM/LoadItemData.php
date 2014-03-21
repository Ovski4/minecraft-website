<?php

namespace Ovski\MinecraftStatsBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ovski\MinecraftStatsBundle\Entity\Item;

class LoadItemData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        /* CREATE ITEMS */

        $activatorRail = new Item();
        $activatorRail->setId("activator_rail");
        $activatorRail->setKillAbility(0);
        $manager->persist($activatorRail);

        $air = new Item();
        $air->setId("air");
        $air->setKillAbility(0);
        $manager->persist($air);

        $anvil = new Item();
        $anvil->setId("anvil");
        $anvil->setKillAbility(0);
        $manager->persist($anvil);

        $apple = new Item();
        $apple->setId("apple");
        $apple->setKillAbility(0);
        $manager->persist($apple);

        $arrow = new Item();
        $arrow->setId("arrow");
        $arrow->setKillAbility(0);
        $manager->persist($arrow);

        $bakedPotato = new Item();
        $bakedPotato->setId("baked_potato");
        $bakedPotato->setKillAbility(0);
        $manager->persist($bakedPotato);

        $beacon = new Item();
        $beacon->setId("beacon");
        $beacon->setKillAbility(0);
        $manager->persist($beacon);

        $bed = new Item();
        $bed->setId("bed");
        $bed->setKillAbility(0);
        $manager->persist($bed);

        $bedBlock = new Item();
        $bedBlock->setId("bed_block");
        $bedBlock->setKillAbility(0);
        $manager->persist($bedBlock);

        $bedrock = new Item();
        $bedrock->setId("bedrock");
        $bedrock->setKillAbility(0);
        $manager->persist($bedrock);

        $birchWoodStairs = new Item();
        $birchWoodStairs->setId("birch_wood_stairs");
        $birchWoodStairs->setKillAbility(0);
        $manager->persist($birchWoodStairs);

        $blazePowder = new Item();
        $blazePowder->setId("blaze_powder");
        $blazePowder->setKillAbility(0);
        $manager->persist($blazePowder);

        $blazeRod = new Item();
        $blazeRod->setId("blaze_rod");
        $blazeRod->setKillAbility(0);
        $manager->persist($blazeRod);

        $boat = new Item();
        $boat->setId("boat");
        $boat->setKillAbility(0);
        $manager->persist($boat);

        $bone = new Item();
        $bone->setId("bone");
        $bone->setKillAbility(0);
        $manager->persist($bone);

        $book = new Item();
        $book->setId("book");
        $book->setKillAbility(0);
        $manager->persist($book);

        $bookAndQuill = new Item();
        $bookAndQuill->setId("book_and_quill");
        $bookAndQuill->setKillAbility(0);
        $manager->persist($bookAndQuill);

        $bookshelf = new Item();
        $bookshelf->setId("bookshelf");
        $bookshelf->setKillAbility(0);
        $manager->persist($bookshelf);

        $bow = new Item();
        $bow->setId("bow");
        $bow->setKillAbility(0);
        $manager->persist($bow);

        $bowl = new Item();
        $bowl->setId("bowl");
        $bowl->setKillAbility(0);
        $manager->persist($bowl);

        $bread = new Item();
        $bread->setId("bread");
        $bread->setKillAbility(0);
        $manager->persist($bread);

        $brewingStand = new Item();
        $brewingStand->setId("brewing_stand");
        $brewingStand->setKillAbility(0);
        $manager->persist($brewingStand);

        $brewingStandItem = new Item();
        $brewingStandItem->setId("brewing_stand_item");
        $brewingStandItem->setKillAbility(0);
        $manager->persist($brewingStandItem);

        $brick = new Item();
        $brick->setId("brick");
        $brick->setKillAbility(0);
        $manager->persist($brick);

        $brickStairs = new Item();
        $brickStairs->setId("brick_stairs");
        $brickStairs->setKillAbility(0);
        $manager->persist($brickStairs);

        $brownMushroom = new Item();
        $brownMushroom->setId("brown_mushroom");
        $brownMushroom->setKillAbility(0);
        $manager->persist($brownMushroom);

        $bucket = new Item();
        $bucket->setId("bucket");
        $bucket->setKillAbility(0);
        $manager->persist($bucket);

        $burningFurnace = new Item();
        $burningFurnace->setId("burning_furnace");
        $burningFurnace->setKillAbility(0);
        $manager->persist($burningFurnace);

        $cactus = new Item();
        $cactus->setId("cactus");
        $cactus->setKillAbility(0);
        $manager->persist($cactus);

        $cake = new Item();
        $cake->setId("cake");
        $cake->setKillAbility(0);
        $manager->persist($cake);

        $cakeBlock = new Item();
        $cakeBlock->setId("cake_block");
        $cakeBlock->setKillAbility(0);
        $manager->persist($cakeBlock);

        $carpet = new Item();
        $carpet->setId("carpet");
        $carpet->setKillAbility(0);
        $manager->persist($carpet);

        $carrot = new Item();
        $carrot->setId("carrot");
        $carrot->setKillAbility(0);
        $manager->persist($carrot);

        $carrotItem = new Item();
        $carrotItem->setId("carrot_item");
        $carrotItem->setKillAbility(0);
        $manager->persist($carrotItem);

        $carrotStick = new Item();
        $carrotStick->setId("carrot_stick");
        $carrotStick->setKillAbility(0);
        $manager->persist($carrotStick);

        $cauldron = new Item();
        $cauldron->setId("cauldron");
        $cauldron->setKillAbility(0);
        $manager->persist($cauldron);

        $cauldronItem = new Item();
        $cauldronItem->setId("cauldron_item");
        $cauldronItem->setKillAbility(0);
        $manager->persist($cauldronItem);

        $chainmailBoots = new Item();
        $chainmailBoots->setId("chainmail_boots");
        $chainmailBoots->setKillAbility(0);
        $manager->persist($chainmailBoots);

        $chainmailChestplate = new Item();
        $chainmailChestplate->setId("chainmail_chestplate");
        $chainmailChestplate->setKillAbility(0);
        $manager->persist($chainmailChestplate);

        $chainmailHelmet = new Item();
        $chainmailHelmet->setId("chainmail_helmet");
        $chainmailHelmet->setKillAbility(0);
        $manager->persist($chainmailHelmet);

        $chainmailLeggings = new Item();
        $chainmailLeggings->setId("chainmail_leggings");
        $chainmailLeggings->setKillAbility(0);
        $manager->persist($chainmailLeggings);

        $chest = new Item();
        $chest->setId("chest");
        $chest->setKillAbility(0);
        $manager->persist($chest);

        $clay = new Item();
        $clay->setId("clay");
        $clay->setKillAbility(0);
        $manager->persist($clay);

        $clayBall = new Item();
        $clayBall->setId("clay_ball");
        $clayBall->setKillAbility(0);
        $manager->persist($clayBall);

        $clayBrick = new Item();
        $clayBrick->setId("clay_brick");
        $clayBrick->setKillAbility(0);
        $manager->persist($clayBrick);

        $coal = new Item();
        $coal->setId("coal");
        $coal->setKillAbility(0);
        $manager->persist($coal);

        $coalBlock = new Item();
        $coalBlock->setId("coal_block");
        $coalBlock->setKillAbility(0);
        $manager->persist($coalBlock);

        $coalOre = new Item();
        $coalOre->setId("coal_ore");
        $coalOre->setKillAbility(0);
        $manager->persist($coalOre);

        $cobbleWall = new Item();
        $cobbleWall->setId("cobble_wall");
        $cobbleWall->setKillAbility(0);
        $manager->persist($cobbleWall);

        $cobblestone = new Item();
        $cobblestone->setId("cobblestone");
        $cobblestone->setKillAbility(0);
        $manager->persist($cobblestone);

        $cobblestoneStairs = new Item();
        $cobblestoneStairs->setId("cobblestone_stairs");
        $cobblestoneStairs->setKillAbility(0);
        $manager->persist($cobblestoneStairs);

        $cocoa = new Item();
        $cocoa->setId("cocoa");
        $cocoa->setKillAbility(0);
        $manager->persist($cocoa);

        $command = new Item();
        $command->setId("command");
        $command->setKillAbility(0);
        $manager->persist($command);

        $compass = new Item();
        $compass->setId("compass");
        $compass->setKillAbility(0);
        $manager->persist($compass);

        $cookedBeef = new Item();
        $cookedBeef->setId("cooked_beef");
        $cookedBeef->setKillAbility(0);
        $manager->persist($cookedBeef);

        $cookedChicken = new Item();
        $cookedChicken->setId("cooked_chicken");
        $cookedChicken->setKillAbility(0);
        $manager->persist($cookedChicken);

        $cookedFish = new Item();
        $cookedFish->setId("cooked_fish");
        $cookedFish->setKillAbility(0);
        $manager->persist($cookedFish);

        $cookie = new Item();
        $cookie->setId("cookie");
        $cookie->setKillAbility(0);
        $manager->persist($cookie);

        $crops = new Item();
        $crops->setId("crops");
        $crops->setKillAbility(0);
        $manager->persist($crops);

        $daylightDetector = new Item();
        $daylightDetector->setId("daylight_detector");
        $daylightDetector->setKillAbility(0);
        $manager->persist($daylightDetector);

        $deadBush = new Item();
        $deadBush->setId("dead_bush");
        $deadBush->setKillAbility(0);
        $manager->persist($deadBush);

        $detectorRail = new Item();
        $detectorRail->setId("detector_rail");
        $detectorRail->setKillAbility(0);
        $manager->persist($detectorRail);

        $diamond = new Item();
        $diamond->setId("diamond");
        $diamond->setKillAbility(0);
        $manager->persist($diamond);

        $diamondAxe = new Item();
        $diamondAxe->setId("diamond_axe");
        $diamondAxe->setKillAbility(0);
        $manager->persist($diamondAxe);

        $diamondBarding = new Item();
        $diamondBarding->setId("diamond_barding");
        $diamondBarding->setKillAbility(0);
        $manager->persist($diamondBarding);

        $diamondBlock = new Item();
        $diamondBlock->setId("diamond_block");
        $diamondBlock->setKillAbility(0);
        $manager->persist($diamondBlock);

        $diamondBoots = new Item();
        $diamondBoots->setId("diamond_boots");
        $diamondBoots->setKillAbility(0);
        $manager->persist($diamondBoots);

        $diamondChestplate = new Item();
        $diamondChestplate->setId("diamond_chestplate");
        $diamondChestplate->setKillAbility(0);
        $manager->persist($diamondChestplate);

        $diamondHelmet = new Item();
        $diamondHelmet->setId("diamond_helmet");
        $diamondHelmet->setKillAbility(0);
        $manager->persist($diamondHelmet);

        $diamondHoe = new Item();
        $diamondHoe->setId("diamond_hoe");
        $diamondHoe->setKillAbility(0);
        $manager->persist($diamondHoe);

        $diamondLeggings = new Item();
        $diamondLeggings->setId("diamond_leggings");
        $diamondLeggings->setKillAbility(0);
        $manager->persist($diamondLeggings);

        $diamondOre = new Item();
        $diamondOre->setId("diamond_ore");
        $diamondOre->setKillAbility(0);
        $manager->persist($diamondOre);

        $diamondPickaxe = new Item();
        $diamondPickaxe->setId("diamond_pickaxe");
        $diamondPickaxe->setKillAbility(0);
        $manager->persist($diamondPickaxe);

        $diamondSpade = new Item();
        $diamondSpade->setId("diamond_spade");
        $diamondSpade->setKillAbility(0);
        $manager->persist($diamondSpade);

        $diamondSword = new Item();
        $diamondSword->setId("diamond_sword");
        $diamondSword->setKillAbility(0);
        $manager->persist($diamondSword);

        $diode = new Item();
        $diode->setId("diode");
        $diode->setKillAbility(0);
        $manager->persist($diode);

        $diodeBlockOff = new Item();
        $diodeBlockOff->setId("diode_block_off");
        $diodeBlockOff->setKillAbility(0);
        $manager->persist($diodeBlockOff);

        $diodeBlockOn = new Item();
        $diodeBlockOn->setId("diode_block_on");
        $diodeBlockOn->setKillAbility(0);
        $manager->persist($diodeBlockOn);

        $dirt = new Item();
        $dirt->setId("dirt");
        $dirt->setKillAbility(0);
        $manager->persist($dirt);

        $dispenser = new Item();
        $dispenser->setId("dispenser");
        $dispenser->setKillAbility(0);
        $manager->persist($dispenser);

        $doubleStep = new Item();
        $doubleStep->setId("double_step");
        $doubleStep->setKillAbility(0);
        $manager->persist($doubleStep);

        $dragonEgg = new Item();
        $dragonEgg->setId("dragon_egg");
        $dragonEgg->setKillAbility(0);
        $manager->persist($dragonEgg);

        $dropper = new Item();
        $dropper->setId("dropper");
        $dropper->setKillAbility(0);
        $manager->persist($dropper);

        $egg = new Item();
        $egg->setId("egg");
        $egg->setKillAbility(0);
        $manager->persist($egg);

        $emerald = new Item();
        $emerald->setId("emerald");
        $emerald->setKillAbility(0);
        $manager->persist($emerald);

        $emeraldBlock = new Item();
        $emeraldBlock->setId("emerald_block");
        $emeraldBlock->setKillAbility(0);
        $manager->persist($emeraldBlock);

        $emeraldOre = new Item();
        $emeraldOre->setId("emerald_ore");
        $emeraldOre->setKillAbility(0);
        $manager->persist($emeraldOre);

        $emptyMap = new Item();
        $emptyMap->setId("empty_map");
        $emptyMap->setKillAbility(0);
        $manager->persist($emptyMap);

        $enchantedBook = new Item();
        $enchantedBook->setId("enchanted_book");
        $enchantedBook->setKillAbility(0);
        $manager->persist($enchantedBook);

        $enchantmentTable = new Item();
        $enchantmentTable->setId("enchantment_table");
        $enchantmentTable->setKillAbility(0);
        $manager->persist($enchantmentTable);

        $enderChest = new Item();
        $enderChest->setId("ender_chest");
        $enderChest->setKillAbility(0);
        $manager->persist($enderChest);

        $enderPearl = new Item();
        $enderPearl->setId("ender_pearl");
        $enderPearl->setKillAbility(0);
        $manager->persist($enderPearl);

        $enderPortal = new Item();
        $enderPortal->setId("ender_portal");
        $enderPortal->setKillAbility(0);
        $manager->persist($enderPortal);

        $enderPortalFrame = new Item();
        $enderPortalFrame->setId("ender_portal_frame");
        $enderPortalFrame->setKillAbility(0);
        $manager->persist($enderPortalFrame);

        $enderStone = new Item();
        $enderStone->setId("ender_stone");
        $enderStone->setKillAbility(0);
        $manager->persist($enderStone);

        $expBottle = new Item();
        $expBottle->setId("exp_bottle");
        $expBottle->setKillAbility(0);
        $manager->persist($expBottle);

        $explosiveMinecart = new Item();
        $explosiveMinecart->setId("explosive_minecart");
        $explosiveMinecart->setKillAbility(0);
        $manager->persist($explosiveMinecart);

        $eyeOfEnder = new Item();
        $eyeOfEnder->setId("eye_of_ender");
        $eyeOfEnder->setKillAbility(0);
        $manager->persist($eyeOfEnder);

        $feather = new Item();
        $feather->setId("feather");
        $feather->setKillAbility(0);
        $manager->persist($feather);

        $fence = new Item();
        $fence->setId("fence");
        $fence->setKillAbility(0);
        $manager->persist($fence);

        $fenceGate = new Item();
        $fenceGate->setId("fence_gate");
        $fenceGate->setKillAbility(0);
        $manager->persist($fenceGate);

        $fermentedSpiderEye = new Item();
        $fermentedSpiderEye->setId("fermented_spider_eye");
        $fermentedSpiderEye->setKillAbility(0);
        $manager->persist($fermentedSpiderEye);

        $fire = new Item();
        $fire->setId("fire");
        $fire->setKillAbility(0);
        $manager->persist($fire);

        $fireball = new Item();
        $fireball->setId("fireball");
        $fireball->setKillAbility(0);
        $manager->persist($fireball);

        $firework = new Item();
        $firework->setId("firework");
        $firework->setKillAbility(0);
        $manager->persist($firework);

        $fireworkCharge = new Item();
        $fireworkCharge->setId("firework_charge");
        $fireworkCharge->setKillAbility(0);
        $manager->persist($fireworkCharge);

        $fishingRod = new Item();
        $fishingRod->setId("fishing_rod");
        $fishingRod->setKillAbility(0);
        $manager->persist($fishingRod);

        $flint = new Item();
        $flint->setId("flint");
        $flint->setKillAbility(0);
        $manager->persist($flint);

        $flintAndSteel = new Item();
        $flintAndSteel->setId("flint_and_steel");
        $flintAndSteel->setKillAbility(0);
        $manager->persist($flintAndSteel);

        $flowerPot = new Item();
        $flowerPot->setId("flower_pot");
        $flowerPot->setKillAbility(0);
        $manager->persist($flowerPot);

        $flowerPotItem = new Item();
        $flowerPotItem->setId("flower_pot_item");
        $flowerPotItem->setKillAbility(0);
        $manager->persist($flowerPotItem);

        $furnace = new Item();
        $furnace->setId("furnace");
        $furnace->setKillAbility(0);
        $manager->persist($furnace);

        $ghastTear = new Item();
        $ghastTear->setId("ghast_tear");
        $ghastTear->setKillAbility(0);
        $manager->persist($ghastTear);

        $glass = new Item();
        $glass->setId("glass");
        $glass->setKillAbility(0);
        $manager->persist($glass);

        $glassBottle = new Item();
        $glassBottle->setId("glass_bottle");
        $glassBottle->setKillAbility(0);
        $manager->persist($glassBottle);

        $glowingRedstoneOre = new Item();
        $glowingRedstoneOre->setId("glowing_redstone_ore");
        $glowingRedstoneOre->setKillAbility(0);
        $manager->persist($glowingRedstoneOre);

        $glowstone = new Item();
        $glowstone->setId("glowstone");
        $glowstone->setKillAbility(0);
        $manager->persist($glowstone);

        $glowstoneDust = new Item();
        $glowstoneDust->setId("glowstone_dust");
        $glowstoneDust->setKillAbility(0);
        $manager->persist($glowstoneDust);

        $goldAxe = new Item();
        $goldAxe->setId("gold_axe");
        $goldAxe->setKillAbility(0);
        $manager->persist($goldAxe);

        $goldBarding = new Item();
        $goldBarding->setId("gold_barding");
        $goldBarding->setKillAbility(0);
        $manager->persist($goldBarding);

        $goldBlock = new Item();
        $goldBlock->setId("gold_block");
        $goldBlock->setKillAbility(0);
        $manager->persist($goldBlock);

        $goldBoots = new Item();
        $goldBoots->setId("gold_boots");
        $goldBoots->setKillAbility(0);
        $manager->persist($goldBoots);

        $goldChestplate = new Item();
        $goldChestplate->setId("gold_chestplate");
        $goldChestplate->setKillAbility(0);
        $manager->persist($goldChestplate);

        $goldHelmet = new Item();
        $goldHelmet->setId("gold_helmet");
        $goldHelmet->setKillAbility(0);
        $manager->persist($goldHelmet);

        $goldHoe = new Item();
        $goldHoe->setId("gold_hoe");
        $goldHoe->setKillAbility(0);
        $manager->persist($goldHoe);

        $goldIngot = new Item();
        $goldIngot->setId("gold_ingot");
        $goldIngot->setKillAbility(0);
        $manager->persist($goldIngot);

        $goldLeggings = new Item();
        $goldLeggings->setId("gold_leggings");
        $goldLeggings->setKillAbility(0);
        $manager->persist($goldLeggings);

        $goldNugget = new Item();
        $goldNugget->setId("gold_nugget");
        $goldNugget->setKillAbility(0);
        $manager->persist($goldNugget);

        $goldOre = new Item();
        $goldOre->setId("gold_ore");
        $goldOre->setKillAbility(0);
        $manager->persist($goldOre);

        $goldPickaxe = new Item();
        $goldPickaxe->setId("gold_pickaxe");
        $goldPickaxe->setKillAbility(0);
        $manager->persist($goldPickaxe);

        $goldPlate = new Item();
        $goldPlate->setId("gold_plate");
        $goldPlate->setKillAbility(0);
        $manager->persist($goldPlate);

        $goldRecord = new Item();
        $goldRecord->setId("gold_record");
        $goldRecord->setKillAbility(0);
        $manager->persist($goldRecord);

        $goldSpade = new Item();
        $goldSpade->setId("gold_spade");
        $goldSpade->setKillAbility(0);
        $manager->persist($goldSpade);

        $goldSword = new Item();
        $goldSword->setId("gold_sword");
        $goldSword->setKillAbility(0);
        $manager->persist($goldSword);

        $goldenApple = new Item();
        $goldenApple->setId("golden_apple");
        $goldenApple->setKillAbility(0);
        $manager->persist($goldenApple);

        $goldenCarrot = new Item();
        $goldenCarrot->setId("golden_carrot");
        $goldenCarrot->setKillAbility(0);
        $manager->persist($goldenCarrot);

        $grass = new Item();
        $grass->setId("grass");
        $grass->setKillAbility(0);
        $manager->persist($grass);

        $gravel = new Item();
        $gravel->setId("gravel");
        $gravel->setKillAbility(0);
        $manager->persist($gravel);

        $greenRecord = new Item();
        $greenRecord->setId("green_record");
        $greenRecord->setKillAbility(0);
        $manager->persist($greenRecord);

        $grilledPork = new Item();
        $grilledPork->setId("grilled_pork");
        $grilledPork->setKillAbility(0);
        $manager->persist($grilledPork);

        $hardClay = new Item();
        $hardClay->setId("hard_clay");
        $hardClay->setKillAbility(0);
        $manager->persist($hardClay);

        $hayBlock = new Item();
        $hayBlock->setId("hay_block");
        $hayBlock->setKillAbility(0);
        $manager->persist($hayBlock);

        $hopper = new Item();
        $hopper->setId("hopper");
        $hopper->setKillAbility(0);
        $manager->persist($hopper);

        $hopperMinecart = new Item();
        $hopperMinecart->setId("hopper_minecart");
        $hopperMinecart->setKillAbility(0);
        $manager->persist($hopperMinecart);

        $hugeMushroom1 = new Item();
        $hugeMushroom1->setId("huge_mushroom_1");
        $hugeMushroom1->setKillAbility(0);
        $manager->persist($hugeMushroom1);

        $hugeMushroom2 = new Item();
        $hugeMushroom2->setId("huge_mushroom_2");
        $hugeMushroom2->setKillAbility(0);
        $manager->persist($hugeMushroom2);

        $ice = new Item();
        $ice->setId("ice");
        $ice->setKillAbility(0);
        $manager->persist($ice);

        $inkSack = new Item();
        $inkSack->setId("ink_sack");
        $inkSack->setKillAbility(0);
        $manager->persist($inkSack);

        $ironAxe = new Item();
        $ironAxe->setId("iron_axe");
        $ironAxe->setKillAbility(0);
        $manager->persist($ironAxe);

        $ironBarding = new Item();
        $ironBarding->setId("iron_barding");
        $ironBarding->setKillAbility(0);
        $manager->persist($ironBarding);

        $ironBlock = new Item();
        $ironBlock->setId("iron_block");
        $ironBlock->setKillAbility(0);
        $manager->persist($ironBlock);

        $ironBoots = new Item();
        $ironBoots->setId("iron_boots");
        $ironBoots->setKillAbility(0);
        $manager->persist($ironBoots);

        $ironChestplate = new Item();
        $ironChestplate->setId("iron_chestplate");
        $ironChestplate->setKillAbility(0);
        $manager->persist($ironChestplate);

        $ironDoor = new Item();
        $ironDoor->setId("iron_door");
        $ironDoor->setKillAbility(0);
        $manager->persist($ironDoor);

        $ironDoorBlock = new Item();
        $ironDoorBlock->setId("iron_door_block");
        $ironDoorBlock->setKillAbility(0);
        $manager->persist($ironDoorBlock);

        $ironFence = new Item();
        $ironFence->setId("iron_fence");
        $ironFence->setKillAbility(0);
        $manager->persist($ironFence);

        $ironHelmet = new Item();
        $ironHelmet->setId("iron_helmet");
        $ironHelmet->setKillAbility(0);
        $manager->persist($ironHelmet);

        $ironHoe = new Item();
        $ironHoe->setId("iron_hoe");
        $ironHoe->setKillAbility(0);
        $manager->persist($ironHoe);

        $ironIngot = new Item();
        $ironIngot->setId("iron_ingot");
        $ironIngot->setKillAbility(0);
        $manager->persist($ironIngot);

        $ironLeggings = new Item();
        $ironLeggings->setId("iron_leggings");
        $ironLeggings->setKillAbility(0);
        $manager->persist($ironLeggings);

        $ironOre = new Item();
        $ironOre->setId("iron_ore");
        $ironOre->setKillAbility(0);
        $manager->persist($ironOre);

        $ironPickaxe = new Item();
        $ironPickaxe->setId("iron_pickaxe");
        $ironPickaxe->setKillAbility(0);
        $manager->persist($ironPickaxe);

        $ironPlate = new Item();
        $ironPlate->setId("iron_plate");
        $ironPlate->setKillAbility(0);
        $manager->persist($ironPlate);

        $ironSpade = new Item();
        $ironSpade->setId("iron_spade");
        $ironSpade->setKillAbility(0);
        $manager->persist($ironSpade);

        $ironSword = new Item();
        $ironSword->setId("iron_sword");
        $ironSword->setKillAbility(0);
        $manager->persist($ironSword);

        $itemFrame = new Item();
        $itemFrame->setId("item_frame");
        $itemFrame->setKillAbility(0);
        $manager->persist($itemFrame);

        $jackOLantern = new Item();
        $jackOLantern->setId("jack_o_lantern");
        $jackOLantern->setKillAbility(0);
        $manager->persist($jackOLantern);

        $jukebox = new Item();
        $jukebox->setId("jukebox");
        $jukebox->setKillAbility(0);
        $manager->persist($jukebox);

        $jungleWoodStairs = new Item();
        $jungleWoodStairs->setId("jungle_wood_stairs");
        $jungleWoodStairs->setKillAbility(0);
        $manager->persist($jungleWoodStairs);

        $ladder = new Item();
        $ladder->setId("ladder");
        $ladder->setKillAbility(0);
        $manager->persist($ladder);

        $lapisBlock = new Item();
        $lapisBlock->setId("lapis_block");
        $lapisBlock->setKillAbility(0);
        $manager->persist($lapisBlock);

        $lapisOre = new Item();
        $lapisOre->setId("lapis_ore");
        $lapisOre->setKillAbility(0);
        $manager->persist($lapisOre);

        $lava = new Item();
        $lava->setId("lava");
        $lava->setKillAbility(0);
        $manager->persist($lava);

        $lavaBucket = new Item();
        $lavaBucket->setId("lava_bucket");
        $lavaBucket->setKillAbility(0);
        $manager->persist($lavaBucket);

        $leash = new Item();
        $leash->setId("leash");
        $leash->setKillAbility(0);
        $manager->persist($leash);

        $leather = new Item();
        $leather->setId("leather");
        $leather->setKillAbility(0);
        $manager->persist($leather);

        $leatherBoots = new Item();
        $leatherBoots->setId("leather_boots");
        $leatherBoots->setKillAbility(0);
        $manager->persist($leatherBoots);

        $leatherChestplate = new Item();
        $leatherChestplate->setId("leather_chestplate");
        $leatherChestplate->setKillAbility(0);
        $manager->persist($leatherChestplate);

        $leatherHelmet = new Item();
        $leatherHelmet->setId("leather_helmet");
        $leatherHelmet->setKillAbility(0);
        $manager->persist($leatherHelmet);

        $leatherLeggings = new Item();
        $leatherLeggings->setId("leather_leggings");
        $leatherLeggings->setKillAbility(0);
        $manager->persist($leatherLeggings);

        $leaves = new Item();
        $leaves->setId("leaves");
        $leaves->setKillAbility(0);
        $manager->persist($leaves);

        $lever = new Item();
        $lever->setId("lever");
        $lever->setKillAbility(0);
        $manager->persist($lever);

        $lockedChest = new Item();
        $lockedChest->setId("locked_chest");
        $lockedChest->setKillAbility(0);
        $manager->persist($lockedChest);

        $log = new Item();
        $log->setId("log");
        $log->setKillAbility(0);
        $manager->persist($log);

        $longGrass = new Item();
        $longGrass->setId("long_grass");
        $longGrass->setKillAbility(0);
        $manager->persist($longGrass);

        $magmaCream = new Item();
        $magmaCream->setId("magma_cream");
        $magmaCream->setKillAbility(0);
        $manager->persist($magmaCream);

        $map = new Item();
        $map->setId("map");
        $map->setKillAbility(0);
        $manager->persist($map);

        $melon = new Item();
        $melon->setId("melon");
        $melon->setKillAbility(0);
        $manager->persist($melon);

        $melonBlock = new Item();
        $melonBlock->setId("melon_block");
        $melonBlock->setKillAbility(0);
        $manager->persist($melonBlock);

        $melonSeeds = new Item();
        $melonSeeds->setId("melon_seeds");
        $melonSeeds->setKillAbility(0);
        $manager->persist($melonSeeds);

        $melonStem = new Item();
        $melonStem->setId("melon_stem");
        $melonStem->setKillAbility(0);
        $manager->persist($melonStem);

        $milkBucket = new Item();
        $milkBucket->setId("milk_bucket");
        $milkBucket->setKillAbility(0);
        $manager->persist($milkBucket);

        $minecart = new Item();
        $minecart->setId("minecart");
        $minecart->setKillAbility(0);
        $manager->persist($minecart);

        $mobSpawner = new Item();
        $mobSpawner->setId("mob_spawner");
        $mobSpawner->setKillAbility(0);
        $manager->persist($mobSpawner);

        $monsterEgg = new Item();
        $monsterEgg->setId("monster_egg");
        $monsterEgg->setKillAbility(0);
        $manager->persist($monsterEgg);

        $monsterEggs = new Item();
        $monsterEggs->setId("monster_eggs");
        $monsterEggs->setKillAbility(0);
        $manager->persist($monsterEggs);

        $mossyCobblestone = new Item();
        $mossyCobblestone->setId("mossy_cobblestone");
        $mossyCobblestone->setKillAbility(0);
        $manager->persist($mossyCobblestone);

        $mushroomSoup = new Item();
        $mushroomSoup->setId("mushroom_soup");
        $mushroomSoup->setKillAbility(0);
        $manager->persist($mushroomSoup);

        $mycel = new Item();
        $mycel->setId("mycel");
        $mycel->setKillAbility(0);
        $manager->persist($mycel);

        $nameTag = new Item();
        $nameTag->setId("name_tag");
        $nameTag->setKillAbility(0);
        $manager->persist($nameTag);

        $netherBrick = new Item();
        $netherBrick->setId("nether_brick");
        $netherBrick->setKillAbility(0);
        $manager->persist($netherBrick);

        $netherBrickItem = new Item();
        $netherBrickItem->setId("nether_brick_item");
        $netherBrickItem->setKillAbility(0);
        $manager->persist($netherBrickItem);

        $netherBrickStairs = new Item();
        $netherBrickStairs->setId("nether_brick_stairs");
        $netherBrickStairs->setKillAbility(0);
        $manager->persist($netherBrickStairs);

        $netherFence = new Item();
        $netherFence->setId("nether_fence");
        $netherFence->setKillAbility(0);
        $manager->persist($netherFence);

        $netherStalk = new Item();
        $netherStalk->setId("nether_stalk");
        $netherStalk->setKillAbility(0);
        $manager->persist($netherStalk);

        $netherStar = new Item();
        $netherStar->setId("nether_star");
        $netherStar->setKillAbility(0);
        $manager->persist($netherStar);

        $netherWarts = new Item();
        $netherWarts->setId("nether_warts");
        $netherWarts->setKillAbility(0);
        $manager->persist($netherWarts);

        $netherrack = new Item();
        $netherrack->setId("netherrack");
        $netherrack->setKillAbility(0);
        $manager->persist($netherrack);

        $noteBlock = new Item();
        $noteBlock->setId("note_block");
        $noteBlock->setKillAbility(0);
        $manager->persist($noteBlock);

        $obsidian = new Item();
        $obsidian->setId("obsidian");
        $obsidian->setKillAbility(0);
        $manager->persist($obsidian);

        $painting = new Item();
        $painting->setId("painting");
        $painting->setKillAbility(0);
        $manager->persist($painting);

        $paper = new Item();
        $paper->setId("paper");
        $paper->setKillAbility(0);
        $manager->persist($paper);

        $pistonBase = new Item();
        $pistonBase->setId("piston_base");
        $pistonBase->setKillAbility(0);
        $manager->persist($pistonBase);

        $pistonExtension = new Item();
        $pistonExtension->setId("piston_extension");
        $pistonExtension->setKillAbility(0);
        $manager->persist($pistonExtension);

        $pistonMovingPiece = new Item();
        $pistonMovingPiece->setId("piston_moving_piece");
        $pistonMovingPiece->setKillAbility(0);
        $manager->persist($pistonMovingPiece);

        $pistonStickyBase = new Item();
        $pistonStickyBase->setId("piston_sticky_base");
        $pistonStickyBase->setKillAbility(0);
        $manager->persist($pistonStickyBase);

        $poisonousPotato = new Item();
        $poisonousPotato->setId("poisonous_potato");
        $poisonousPotato->setKillAbility(0);
        $manager->persist($poisonousPotato);

        $pork = new Item();
        $pork->setId("pork");
        $pork->setKillAbility(0);
        $manager->persist($pork);

        $portal = new Item();
        $portal->setId("portal");
        $portal->setKillAbility(0);
        $manager->persist($portal);

        $potato = new Item();
        $potato->setId("potato");
        $potato->setKillAbility(0);
        $manager->persist($potato);

        $potatoItem = new Item();
        $potatoItem->setId("potato_item");
        $potatoItem->setKillAbility(0);
        $manager->persist($potatoItem);

        $potion = new Item();
        $potion->setId("potion");
        $potion->setKillAbility(0);
        $manager->persist($potion);

        $poweredMinecart = new Item();
        $poweredMinecart->setId("powered_minecart");
        $poweredMinecart->setKillAbility(0);
        $manager->persist($poweredMinecart);

        $poweredRail = new Item();
        $poweredRail->setId("powered_rail");
        $poweredRail->setKillAbility(0);
        $manager->persist($poweredRail);

        $pumpkin = new Item();
        $pumpkin->setId("pumpkin");
        $pumpkin->setKillAbility(0);
        $manager->persist($pumpkin);

        $pumpkinPie = new Item();
        $pumpkinPie->setId("pumpkin_pie");
        $pumpkinPie->setKillAbility(0);
        $manager->persist($pumpkinPie);

        $pumpkinSeeds = new Item();
        $pumpkinSeeds->setId("pumpkin_seeds");
        $pumpkinSeeds->setKillAbility(0);
        $manager->persist($pumpkinSeeds);

        $pumpkinStem = new Item();
        $pumpkinStem->setId("pumpkin_stem");
        $pumpkinStem->setKillAbility(0);
        $manager->persist($pumpkinStem);

        $quartz = new Item();
        $quartz->setId("quartz");
        $quartz->setKillAbility(0);
        $manager->persist($quartz);

        $quartzBlock = new Item();
        $quartzBlock->setId("quartz_block");
        $quartzBlock->setKillAbility(0);
        $manager->persist($quartzBlock);

        $quartzOre = new Item();
        $quartzOre->setId("quartz_ore");
        $quartzOre->setKillAbility(0);
        $manager->persist($quartzOre);

        $quartzStairs = new Item();
        $quartzStairs->setId("quartz_stairs");
        $quartzStairs->setKillAbility(0);
        $manager->persist($quartzStairs);

        $rails = new Item();
        $rails->setId("rails");
        $rails->setKillAbility(0);
        $manager->persist($rails);

        $rawBeef = new Item();
        $rawBeef->setId("raw_beef");
        $rawBeef->setKillAbility(0);
        $manager->persist($rawBeef);

        $rawChicken = new Item();
        $rawChicken->setId("raw_chicken");
        $rawChicken->setKillAbility(0);
        $manager->persist($rawChicken);

        $rawFish = new Item();
        $rawFish->setId("raw_fish");
        $rawFish->setKillAbility(0);
        $manager->persist($rawFish);

        $record10 = new Item();
        $record10->setId("record_10");
        $record10->setKillAbility(0);
        $manager->persist($record10);

        $record11 = new Item();
        $record11->setId("record_11");
        $record11->setKillAbility(0);
        $manager->persist($record11);

        $record12 = new Item();
        $record12->setId("record_12");
        $record12->setKillAbility(0);
        $manager->persist($record12);

        $record3 = new Item();
        $record3->setId("record_3");
        $record3->setKillAbility(0);
        $manager->persist($record3);

        $record4 = new Item();
        $record4->setId("record_4");
        $record4->setKillAbility(0);
        $manager->persist($record4);

        $record5 = new Item();
        $record5->setId("record_5");
        $record5->setKillAbility(0);
        $manager->persist($record5);

        $record6 = new Item();
        $record6->setId("record_6");
        $record6->setKillAbility(0);
        $manager->persist($record6);

        $record7 = new Item();
        $record7->setId("record_7");
        $record7->setKillAbility(0);
        $manager->persist($record7);

        $record8 = new Item();
        $record8->setId("record_8");
        $record8->setKillAbility(0);
        $manager->persist($record8);

        $record9 = new Item();
        $record9->setId("record_9");
        $record9->setKillAbility(0);
        $manager->persist($record9);

        $redMushroom = new Item();
        $redMushroom->setId("red_mushroom");
        $redMushroom->setKillAbility(0);
        $manager->persist($redMushroom);

        $redRose = new Item();
        $redRose->setId("red_rose");
        $redRose->setKillAbility(0);
        $manager->persist($redRose);

        $redstone = new Item();
        $redstone->setId("redstone");
        $redstone->setKillAbility(0);
        $manager->persist($redstone);

        $redstoneBlock = new Item();
        $redstoneBlock->setId("redstone_block");
        $redstoneBlock->setKillAbility(0);
        $manager->persist($redstoneBlock);

        $redstoneComparator = new Item();
        $redstoneComparator->setId("redstone_comparator");
        $redstoneComparator->setKillAbility(0);
        $manager->persist($redstoneComparator);

        $redstoneComparatorOff = new Item();
        $redstoneComparatorOff->setId("redstone_comparator_off");
        $redstoneComparatorOff->setKillAbility(0);
        $manager->persist($redstoneComparatorOff);

        $redstoneComparatorOn = new Item();
        $redstoneComparatorOn->setId("redstone_comparator_on");
        $redstoneComparatorOn->setKillAbility(0);
        $manager->persist($redstoneComparatorOn);

        $redstoneLampOff = new Item();
        $redstoneLampOff->setId("redstone_lamp_off");
        $redstoneLampOff->setKillAbility(0);
        $manager->persist($redstoneLampOff);

        $redstoneLampOn = new Item();
        $redstoneLampOn->setId("redstone_lamp_on");
        $redstoneLampOn->setKillAbility(0);
        $manager->persist($redstoneLampOn);

        $redstoneOre = new Item();
        $redstoneOre->setId("redstone_ore");
        $redstoneOre->setKillAbility(0);
        $manager->persist($redstoneOre);

        $redstoneTorchOff = new Item();
        $redstoneTorchOff->setId("redstone_torch_off");
        $redstoneTorchOff->setKillAbility(0);
        $manager->persist($redstoneTorchOff);

        $redstoneTorchOn = new Item();
        $redstoneTorchOn->setId("redstone_torch_on");
        $redstoneTorchOn->setKillAbility(0);
        $manager->persist($redstoneTorchOn);

        $redstoneWire = new Item();
        $redstoneWire->setId("redstone_wire");
        $redstoneWire->setKillAbility(0);
        $manager->persist($redstoneWire);

        $rottenFlesh = new Item();
        $rottenFlesh->setId("rotten_flesh");
        $rottenFlesh->setKillAbility(0);
        $manager->persist($rottenFlesh);

        $saddle = new Item();
        $saddle->setId("saddle");
        $saddle->setKillAbility(0);
        $manager->persist($saddle);

        $sand = new Item();
        $sand->setId("sand");
        $sand->setKillAbility(0);
        $manager->persist($sand);

        $sandstone = new Item();
        $sandstone->setId("sandstone");
        $sandstone->setKillAbility(0);
        $manager->persist($sandstone);

        $sandstoneStairs = new Item();
        $sandstoneStairs->setId("sandstone_stairs");
        $sandstoneStairs->setKillAbility(0);
        $manager->persist($sandstoneStairs);

        $sapling = new Item();
        $sapling->setId("sapling");
        $sapling->setKillAbility(0);
        $manager->persist($sapling);

        $seeds = new Item();
        $seeds->setId("seeds");
        $seeds->setKillAbility(0);
        $manager->persist($seeds);

        $shears = new Item();
        $shears->setId("shears");
        $shears->setKillAbility(0);
        $manager->persist($shears);

        $sign = new Item();
        $sign->setId("sign");
        $sign->setKillAbility(0);
        $manager->persist($sign);

        $signPost = new Item();
        $signPost->setId("sign_post");
        $signPost->setKillAbility(0);
        $manager->persist($signPost);

        $skull = new Item();
        $skull->setId("skull");
        $skull->setKillAbility(0);
        $manager->persist($skull);

        $skullItem = new Item();
        $skullItem->setId("skull_item");
        $skullItem->setKillAbility(0);
        $manager->persist($skullItem);

        $slimeBall = new Item();
        $slimeBall->setId("slime_ball");
        $slimeBall->setKillAbility(0);
        $manager->persist($slimeBall);

        $smoothBrick = new Item();
        $smoothBrick->setId("smooth_brick");
        $smoothBrick->setKillAbility(0);
        $manager->persist($smoothBrick);

        $smoothStairs = new Item();
        $smoothStairs->setId("smooth_stairs");
        $smoothStairs->setKillAbility(0);
        $manager->persist($smoothStairs);

        $snow = new Item();
        $snow->setId("snow");
        $snow->setKillAbility(0);
        $manager->persist($snow);

        $snowBall = new Item();
        $snowBall->setId("snow_ball");
        $snowBall->setKillAbility(0);
        $manager->persist($snowBall);

        $snowBlock = new Item();
        $snowBlock->setId("snow_block");
        $snowBlock->setKillAbility(0);
        $manager->persist($snowBlock);

        $soil = new Item();
        $soil->setId("soil");
        $soil->setKillAbility(0);
        $manager->persist($soil);

        $soulSand = new Item();
        $soulSand->setId("soul_sand");
        $soulSand->setKillAbility(0);
        $manager->persist($soulSand);

        $speckledMelon = new Item();
        $speckledMelon->setId("speckled_melon");
        $speckledMelon->setKillAbility(0);
        $manager->persist($speckledMelon);

        $spiderEye = new Item();
        $spiderEye->setId("spider_eye");
        $spiderEye->setKillAbility(0);
        $manager->persist($spiderEye);

        $sponge = new Item();
        $sponge->setId("sponge");
        $sponge->setKillAbility(0);
        $manager->persist($sponge);

        $spruceWoodStairs = new Item();
        $spruceWoodStairs->setId("spruce_wood_stairs");
        $spruceWoodStairs->setKillAbility(0);
        $manager->persist($spruceWoodStairs);

        $stainedClay = new Item();
        $stainedClay->setId("stained_clay");
        $stainedClay->setKillAbility(0);
        $manager->persist($stainedClay);

        $stationaryLava = new Item();
        $stationaryLava->setId("stationary_lava");
        $stationaryLava->setKillAbility(0);
        $manager->persist($stationaryLava);

        $stationaryWater = new Item();
        $stationaryWater->setId("stationary_water");
        $stationaryWater->setKillAbility(0);
        $manager->persist($stationaryWater);

        $step = new Item();
        $step->setId("step");
        $step->setKillAbility(0);
        $manager->persist($step);

        $stick = new Item();
        $stick->setId("stick");
        $stick->setKillAbility(0);
        $manager->persist($stick);

        $stone = new Item();
        $stone->setId("stone");
        $stone->setKillAbility(0);
        $manager->persist($stone);

        $stoneAxe = new Item();
        $stoneAxe->setId("stone_axe");
        $stoneAxe->setKillAbility(0);
        $manager->persist($stoneAxe);

        $stoneButton = new Item();
        $stoneButton->setId("stone_button");
        $stoneButton->setKillAbility(0);
        $manager->persist($stoneButton);

        $stoneHoe = new Item();
        $stoneHoe->setId("stone_hoe");
        $stoneHoe->setKillAbility(0);
        $manager->persist($stoneHoe);

        $stonePickaxe = new Item();
        $stonePickaxe->setId("stone_pickaxe");
        $stonePickaxe->setKillAbility(0);
        $manager->persist($stonePickaxe);

        $stonePlate = new Item();
        $stonePlate->setId("stone_plate");
        $stonePlate->setKillAbility(0);
        $manager->persist($stonePlate);

        $stoneSpade = new Item();
        $stoneSpade->setId("stone_spade");
        $stoneSpade->setKillAbility(0);
        $manager->persist($stoneSpade);

        $stoneSword = new Item();
        $stoneSword->setId("stone_sword");
        $stoneSword->setKillAbility(0);
        $manager->persist($stoneSword);

        $storageMinecart = new Item();
        $storageMinecart->setId("storage_minecart");
        $storageMinecart->setKillAbility(0);
        $manager->persist($storageMinecart);

        $string = new Item();
        $string->setId("string");
        $string->setKillAbility(0);
        $manager->persist($string);

        $sugar = new Item();
        $sugar->setId("sugar");
        $sugar->setKillAbility(0);
        $manager->persist($sugar);

        $sugarCane = new Item();
        $sugarCane->setId("sugar_cane");
        $sugarCane->setKillAbility(0);
        $manager->persist($sugarCane);

        $sugarCaneBlock = new Item();
        $sugarCaneBlock->setId("sugar_cane_block");
        $sugarCaneBlock->setKillAbility(0);
        $manager->persist($sugarCaneBlock);

        $sulphur = new Item();
        $sulphur->setId("sulphur");
        $sulphur->setKillAbility(0);
        $manager->persist($sulphur);

        $thinGlass = new Item();
        $thinGlass->setId("thin_glass");
        $thinGlass->setKillAbility(0);
        $manager->persist($thinGlass);

        $tnt = new Item();
        $tnt->setId("tnt");
        $tnt->setKillAbility(0);
        $manager->persist($tnt);

        $torch = new Item();
        $torch->setId("torch");
        $torch->setKillAbility(0);
        $manager->persist($torch);

        $trapDoor = new Item();
        $trapDoor->setId("trap_door");
        $trapDoor->setKillAbility(0);
        $manager->persist($trapDoor);

        $trappedChest = new Item();
        $trappedChest->setId("trapped_chest");
        $trappedChest->setKillAbility(0);
        $manager->persist($trappedChest);

        $tripwire = new Item();
        $tripwire->setId("tripwire");
        $tripwire->setKillAbility(0);
        $manager->persist($tripwire);

        $tripwireHook = new Item();
        $tripwireHook->setId("tripwire_hook");
        $tripwireHook->setKillAbility(0);
        $manager->persist($tripwireHook);

        $vine = new Item();
        $vine->setId("vine");
        $vine->setKillAbility(0);
        $manager->persist($vine);

        $wallSign = new Item();
        $wallSign->setId("wall_sign");
        $wallSign->setKillAbility(0);
        $manager->persist($wallSign);

        $watch = new Item();
        $watch->setId("watch");
        $watch->setKillAbility(0);
        $manager->persist($watch);

        $water = new Item();
        $water->setId("water");
        $water->setKillAbility(0);
        $manager->persist($water);

        $waterBucket = new Item();
        $waterBucket->setId("water_bucket");
        $waterBucket->setKillAbility(0);
        $manager->persist($waterBucket);

        $waterLily = new Item();
        $waterLily->setId("water_lily");
        $waterLily->setKillAbility(0);
        $manager->persist($waterLily);

        $web = new Item();
        $web->setId("web");
        $web->setKillAbility(0);
        $manager->persist($web);

        $wheat = new Item();
        $wheat->setId("wheat");
        $wheat->setKillAbility(0);
        $manager->persist($wheat);

        $wood = new Item();
        $wood->setId("wood");
        $wood->setKillAbility(0);
        $manager->persist($wood);

        $woodAxe = new Item();
        $woodAxe->setId("wood_axe");
        $woodAxe->setKillAbility(0);
        $manager->persist($woodAxe);

        $woodButton = new Item();
        $woodButton->setId("wood_button");
        $woodButton->setKillAbility(0);
        $manager->persist($woodButton);

        $woodDoor = new Item();
        $woodDoor->setId("wood_door");
        $woodDoor->setKillAbility(0);
        $manager->persist($woodDoor);

        $woodDoubleStep = new Item();
        $woodDoubleStep->setId("wood_double_step");
        $woodDoubleStep->setKillAbility(0);
        $manager->persist($woodDoubleStep);

        $woodHoe = new Item();
        $woodHoe->setId("wood_hoe");
        $woodHoe->setKillAbility(0);
        $manager->persist($woodHoe);

        $woodPickaxe = new Item();
        $woodPickaxe->setId("wood_pickaxe");
        $woodPickaxe->setKillAbility(0);
        $manager->persist($woodPickaxe);

        $woodPlate = new Item();
        $woodPlate->setId("wood_plate");
        $woodPlate->setKillAbility(0);
        $manager->persist($woodPlate);

        $woodSpade = new Item();
        $woodSpade->setId("wood_spade");
        $woodSpade->setKillAbility(0);
        $manager->persist($woodSpade);

        $woodStairs = new Item();
        $woodStairs->setId("wood_stairs");
        $woodStairs->setKillAbility(0);
        $manager->persist($woodStairs);

        $woodStep = new Item();
        $woodStep->setId("wood_step");
        $woodStep->setKillAbility(0);
        $manager->persist($woodStep);

        $woodSword = new Item();
        $woodSword->setId("wood_sword");
        $woodSword->setKillAbility(0);
        $manager->persist($woodSword);

        $woodenDoor = new Item();
        $woodenDoor->setId("wooden_door");
        $woodenDoor->setKillAbility(0);
        $manager->persist($woodenDoor);

        $wool = new Item();
        $wool->setId("wool");
        $wool->setKillAbility(0);
        $manager->persist($wool);

        $workbench = new Item();
        $workbench->setId("workbench");
        $workbench->setKillAbility(0);
        $manager->persist($workbench);

        $writtenBook = new Item();
        $writtenBook->setId("written_book");
        $writtenBook->setKillAbility(0);
        $manager->persist($writtenBook);

        $yellowFlower = new Item();
        $yellowFlower->setId("yellow_flower");
        $yellowFlower->setKillAbility(0);
        $manager->persist($yellowFlower);

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 8;
    }
}