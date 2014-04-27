<?php
/**   OGotcha, a combat report converter for Ogame
 *    Copyright (C) 2014  Klaas Van Parys
 *
 *   This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation, either version 3 of the License, or
 *   (at your option) any later version.
 *
 *    This program is distributed in the hope that it will be useful,
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *   GNU General Public License for more details.
 *
 *    You should have received a copy of the GNU General Public License
 *   along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 *   This program is based on the Kokx's CR Converter © 2009 kokx: https://github.com/kokx/kokx-converter
 *   
 *   This file is not part of the original program and therefore it only inherits this copyright: Copyright (C) 2014 Klaas Van Parys
 */

$lang[''] = '';
$lang[' & '] = ' & ';
$lang['[TOT: %s] %s vs. %s (A: %s, D: %s)'] = '[TOT: %s] %s vs. %s (A: %s, V: %s)';
$lang['Invalid post'] ='Je moet minstens een gevechtsrapport en skin meegeven.';
$lang['Dutch'] =  'Nederlands';
$lang['English'] =  'Engels';
$lang['Convert'] =  'Converteer';
$lang['Preview'] =  'Voorbeeld';
$lang['Bad Cr'] = 'Er is iets fout met het gevechtsrapport, kijk eens of deze volledig is en/of je de juist taal heb gekozen!';
$lang['Attackers'] ='Aanvaller(s)';
$lang['Defenders'] ='Verdediger(s)';

$lang['Harvested by the attackers']= 'Opgehaald door de aanvaller(s)';
$lang['Harvested by the defenders']= 'Opgehaald door de verdediger(s)';

$lang['The attacker(s) used a total of %s units fuel.'] = 'De aanvaller(s) hebben een totaal van %s Eenheden brandstof gebruikt.';
$lang['The defender(s) used a total of %s units fuel.'] = 'De verdediger(s) hebben een totaal van %s Eenheden brandstof gebruikt.';

$lang['Title Placeholder'] = 'Hier komt de titel van het geconverteerde gevechtsrapport';
$lang['Result Placeholder'] = 'Hier komt het geconverteerde gevechtsrapport';

$lang['OGotcha'] = 'OGotcha CR converter';

#: data/translate/ids/ships.php:32
$lang["Small Cargo"] = "Klein vrachtschip";

#: data/translate/ids/ships.php:33
$lang["Large Cargo"] = "Groot vrachtschip";

#: data/translate/ids/ships.php:34
$lang["Light Fighter"] = "Licht gevechtsschip";

#: data/translate/ids/ships.php:35
$lang["Heavy Fighter"] = "Zwaar gevechtsschip";

#: data/translate/ids/ships.php:36
$lang["Cruiser"] = "Kruiser";

#: data/translate/ids/ships.php:37
$lang["Battleship"] = "Slagschip";

#: data/translate/ids/ships.php:38
$lang["Colony Ship"] = "Kolonisatieschip";

#: data/translate/ids/ships.php:39
$lang["Recycler"] = "Recycler";

#: data/translate/ids/ships.php:40
$lang["Espionage Probe"] ="Spionagesonde";

#: data/translate/ids/ships.php:41
$lang["Bomber"] ="Bommenwerper";

#: data/translate/ids/ships.php:42
$lang["Solar Sattelite"] ="Zonne-energiesatelliet";

#: data/translate/ids/ships.php:43
$lang["Destroyer"] ="Vernietiger";

#: data/translate/ids/ships.php:44
$lang["Deathstar"] ="Ster des Doods";

#: data/translate/ids/ships.php:45
$lang["Battlecruiser"] ="Interceptor";

#: data/translate/ids/ships.php:48
$lang["Rocket Launcher"] ="Raketlanceerder";

#: data/translate/ids/ships.php:49
$lang["Light Laser"] ="Kleine laser";

#: data/translate/ids/ships.php:50
$lang["Heavy Laser"] ="Grote laser";

#: data/translate/ids/ships.php:51
$lang["Gauss Cannon"] ="Gausskanon";

#: data/translate/ids/ships.php:52
$lang["Ion Cannon"] ="Ionkanon";

#: data/translate/ids/ships.php:53
$lang["Plasma Turret"] ="Plasmakanon";

#: data/translate/ids/ships.php:54
$lang["Small Shield Dome"] ="Kleine planetaire schildkoepel";

#: data/translate/ids/ships.php:55
$lang["Large Shield Dome"] ="Grote planetaire schildkoepel";

#: application/layouts/default.phtml:27
#: application/layouts/default.phtml:47
$lang["Kokx's OGame CR converter"] ="Kokx's OGame CR converter";

#: application/modules/default/views/scripts/index/index.phtml:4
$lang["Invalid CR"] ="Incorrect gevechtsrapport";

#: application/modules/default/views/scripts/index/index.phtml:10
$lang["Title:"] ="Titel:";

#: application/modules/default/views/scripts/index/index.phtml:16
$lang["Convert!"] ="Converteer!";

#: application/modules/default/views/scripts/index/index.phtml:20
$lang["Generic options"] ="Algemene opties";

#: application/modules/default/views/scripts/index/index.phtml:23
$lang["Skin"] ="Skin";

#: application/modules/default/views/scripts/index/index.phtml:30
$lang["Hide the time"] ="Verberg de tijd";

#: application/modules/default/views/scripts/index/index.phtml:34
$lang["Text in the middle of the CR"] ="Tekst in het midden van de CR";

#: application/modules/default/views/scripts/index/index.phtml:34
$lang["After the battle"] =  "Na het gevecht...";

#: application/modules/default/views/scripts/index/index.phtml:36
$lang["Merge fleets of the same player"] ="Voeg vloten van dezelfde speler samen";

#: application/modules/default/views/scripts/index/index.phtml:43
$lang["Raids"] ="Naraids";

#: application/modules/default/views/scripts/index/index.phtml:48
$lang["Harvest Reports"] ="Puinrapporten";

#: application/modules/default/views/scripts/index/index.phtml:55
$lang["Deuterium Costs"] ="Deuterium kosten";

#: application/modules/default/renderers/kokx/scripts/time.phtml:2
$lang["On "] ="De volgende vloten kwamen elkaar tegen op ";

#: application/modules/default/renderers/kokx/scripts/time.phtml:11
$lang[" , the following fleets met in battle:"] =", toen het tot een gevecht kwam:";

#: application/modules/default/renderers/kokx/scripts/firstround.phtml:7
$lang["Attacker"] ="Aanvaller";

#: application/modules/default/renderers/kokx/scripts/firstround.phtml:19
$lang["Defender"] ="Verdediger";

#: application/modules/default/renderers/kokx/scripts/winnerloot.phtml:2
$lang["The battle ends in a draw."] ="Het gevecht eindigt in een remise.";

#: application/modules/default/renderers/kokx/scripts/winnerloot.phtml:4
$lang["The attacker has won the battle!"] ="De aanvaller heeft het gevecht gewonnen!";

#: application/modules/default/renderers/kokx/scripts/winnerloot.phtml:6
$lang["The defender has won the battle!"] ="De verdediger heeft het gevecht gewonnen!";

#: application/modules/default/renderers/kokx/scripts/winnerloot.phtml:8
$lang["The attacker captured:"] ="De aanvaller steelt:";

#: application/modules/default/renderers/kokx/scripts/winnerloot.phtml:10
#: application/modules/default/renderers/kokx/scripts/winnerloot.phtml:12
#: application/modules/default/renderers/kokx/scripts/winnerloot.phtml:15
$lang["metal"] ="Metaal";

#: application/modules/default/renderers/kokx/scripts/winnerloot.phtml:10
#: application/modules/default/renderers/kokx/scripts/winnerloot.phtml:12
#: application/modules/default/renderers/kokx/scripts/winnerloot.phtml:15
$lang["crystal"] ="Kristal";

#: application/modules/default/renderers/kokx/scripts/winnerloot.phtml:10
#: application/modules/default/renderers/kokx/scripts/winnerloot.phtml:12
#: application/modules/default/renderers/kokx/scripts/winnerloot.phtml:15
$lang["and"] ="en";

#: application/modules/default/renderers/kokx/scripts/winnerloot.phtml:10
#: application/modules/default/renderers/kokx/scripts/winnerloot.phtml:12
#: application/modules/default/renderers/kokx/scripts/winnerloot.phtml:15
$lang["deuterium"] ="Deuterium";

#: application/modules/default/renderers/kokx/scripts/debris.phtml:5
#: application/modules/default/renderers/tsjerk/scripts/debris.phtml:5
$lang["Your "] ="Je ";

#: application/modules/default/renderers/kokx/scripts/debris.phtml:5
#: application/modules/default/renderers/tsjerk/scripts/debris.phtml:5
$lang[" recycler(s) have a total cargo capacity of "] =" recyclers hebben een totale opslagcapaciteit van ";

#: application/modules/default/renderers/kokx/scripts/debris.phtml:6
#: application/modules/default/renderers/tsjerk/scripts/debris.phtml:6
$lang["At the target, "] ="In het bestemmingsveld zweven ";

#: application/modules/default/renderers/kokx/scripts/debris.phtml:6
#: application/modules/default/renderers/tsjerk/scripts/debris.phtml:6
$lang[" metal and "] =" Metaal en ";

#: application/modules/default/renderers/kokx/scripts/debris.phtml:6
#: application/modules/default/renderers/tsjerk/scripts/debris.phtml:6
$lang[" crystal are floating in space."] =" kristal in de ruimte.";

#: application/modules/default/renderers/kokx/scripts/debris.phtml:7
#: application/modules/default/renderers/tsjerk/scripts/debris.phtml:7
#, c-format
$lang["You have harvested %s metal and %s crystal."] ="Je hebt %s metaal en %s kristal opgehaald.";

#: application/modules/default/renderers/kokx/scripts/debris.phtml:10
#: application/modules/default/renderers/tsjerk/scripts/debris.phtml:10
$lang["Recycled: "] ="Opgehaald: ";

#: application/modules/default/renderers/kokx/scripts/debris.phtml:14
#: application/modules/default/renderers/tsjerk/scripts/debris.phtml:14
$lang["A total of "] ="Er is een totaal van ";

#: application/modules/default/renderers/kokx/scripts/debris.phtml:14
#: application/modules/default/renderers/tsjerk/scripts/debris.phtml:14
$lang[" units debris has been recycled."] =" Eenheden puin opgehaald";

$lang[" units debris has been recycled by the defenders."] = " Eenheden puin opgehaald door de verdediger(s).";
$lang[" units debris has been recycled by the attackers."] = " Eenheden puin opgehaald door de aanvaller(s).";


#: application/modules/default/renderers/kokx/scripts/lossesmoon.phtml:1
#: application/modules/default/renderers/kokx/scripts/summary.phtml:20
#: application/modules/default/renderers/kokx/scripts/summary.phtml:32
#: application/modules/default/renderers/kokx/scripts/summary.phtml:41
#: application/modules/default/renderers/tsjerk/scripts/lossesmoon.phtml:1
#: application/modules/default/renderers/tsjerk/scripts/summary.phtml:16
#: application/modules/default/renderers/tsjerk/scripts/summary.phtml:28
#: application/modules/default/renderers/tsjerk/scripts/summary.phtml:37
#, c-format
$lang["The attacker lost a total of %s units."] ="De aanvaller heeft een totaal van %s Eenheden verloren.";

#: application/modules/default/renderers/kokx/scripts/lossesmoon.phtml:2
#: application/modules/default/renderers/kokx/scripts/summary.phtml:22
#: application/modules/default/renderers/kokx/scripts/summary.phtml:34
#: application/modules/default/renderers/kokx/scripts/summary.phtml:43
#: application/modules/default/renderers/tsjerk/scripts/lossesmoon.phtml:2
#: application/modules/default/renderers/tsjerk/scripts/summary.phtml:18
#: application/modules/default/renderers/tsjerk/scripts/summary.phtml:30
#: application/modules/default/renderers/tsjerk/scripts/summary.phtml:39
#, c-format
$lang["The defender lost a total of %s units."] ="De verdediger heeft een totaal van %s Eenheden verloren.";

#: application/modules/default/renderers/kokx/scripts/lossesmoon.phtml:3
#: application/modules/default/renderers/tsjerk/scripts/lossesmoon.phtml:3
$lang["At these space coordinates now float "] ="Op deze coordinaten in de ruimte zweven nu ";

#: application/modules/default/renderers/kokx/scripts/lossesmoon.phtml:3
#: application/modules/default/renderers/tsjerk/scripts/lossesmoon.phtml:3
$lang["crystal."] ="Kristal.";

#: application/modules/default/renderers/kokx/scripts/lossesmoon.phtml:5
#: application/modules/default/renderers/tsjerk/scripts/lossesmoon.phtml:5
$lang["The chance for a moon to be created is: "] ="Maankans: ";

#: application/modules/default/renderers/kokx/scripts/lossesmoon.phtml:8
#: application/modules/default/renderers/tsjerk/scripts/lossesmoon.phtml:8
$lang["The enormous amounts of free metal and crystal draw together and form a moon around the planet: "] ="De enorme hoeveelheden van rondzwevende metaal- en kristaldeeltjes trekken elkaar aan en vormen langzaam een maan, in een baan rond de planeet: ";

#: application/modules/default/renderers/kokx/scripts/lossesmoon.phtml:9
#: application/modules/default/renderers/tsjerk/scripts/lossesmoon.phtml:9
$lang["Moon given!"] ="Maan gegeven!";

#: application/modules/default/renderers/kokx/scripts/summary.phtml:2
#: application/modules/default/renderers/tsjerk/scripts/summary.phtml:2
#, c-format
$lang["The attacker captured a total of %s units."] ="De aanvaller heeft een totaal van %s Eenheden gestolen.";

#: application/modules/default/renderers/kokx/scripts/summary.phtml:6
#: application/modules/default/renderers/tsjerk/scripts/summary.phtml:6
$lang["Summary of profit/losses:"] ="Totale samenvatting winst/verlies:";

#: application/modules/default/renderers/kokx/scripts/summary.phtml:18
#: application/modules/default/renderers/kokx/scripts/summary.phtml:30
#: application/modules/default/renderers/tsjerk/scripts/summary.phtml:14
#: application/modules/default/renderers/tsjerk/scripts/summary.phtml:26
#, c-format
$lang["The attacker made a profit of %s units."] ="De aanvaller heeft een totaal van %s Eenheden winst gemaakt.";

#: application/modules/default/renderers/kokx/scripts/summary.phtml:43
#: application/modules/default/renderers/tsjerk/scripts/summary.phtml:39
#, c-format
$lang["The defender made a profit of %s units."] ="De verdediger heeft een totaal van %s Eenheden winst gemaakt.";

#: application/modules/default/renderers/kokx/scripts/lastround.phtml:17
#: application/modules/default/renderers/kokx/scripts/lastround.phtml:42
#: application/modules/default/renderers/tsjerk/scripts/lastround.phtml:17
#: application/modules/default/renderers/tsjerk/scripts/lastround.phtml:42
$lang["Destroyed!"] ="Vernietigd!";

#~ $lang["You have harvested "] =
#~ "Je hebt ";

#~ $lang[" crystal."] =
#~ " Kristal.";

#~ $lang["Hide options"] =
#~ "Verberg opties";

#~ $lang["Je "] =
#~ "Je ";

#~ $lang[" units."] =
#~ " Eenheden verloren.";