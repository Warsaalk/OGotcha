<?php
$regexes['print'] = '[^[:print:]]';

//Fuel Regex
$regexes['fuel'] = '([0-9.]*?) Deuterium';

//Raid Regex
$regexes['advanced_raid'] = 'De aanvaller heeft het gevecht gewonnen\! De aanvaller steelt ([0-9.]*) ';
$regexes['simple_raid'] = '([0-9.]*) metaal, ([0-9.]*) kristal en ([0-9.]*) deuterium';

//Harvest Regex
$regexes['harvest'] = 'Je\s*\(([0-9.]*?)\)\s*recycler\(s\)\s*hebben\s*een\s*totale\s*opslagcapaciteit\s*van\s*([0-9.]*?).\s*';
$regexes['harvest'] .= 'In\s*het\s*bestemmingsveld\s*\[([0-9.]*?:[0-9.]*?:[0-9.]*?)\]\s*zweven\s*([0-9.]*?)\s*metaal\s*en\s*([0-9.]*?)\s*kristal\s*in\s*de\s*ruimte.\s*';
$regexes['harvest'] .= 'Je\s*hebt\s*([0-9.]*?)\s*metaal\s*en\s*([0-9.]*?)\s*kristal\s*opgehaald.';

//Combat Regex
$regexes['start'] = 'De volgende vloten kwamen elkaar tegen op';
$regexes['time'] = '^De volgende vloten kwamen elkaar tegen op \(([0-9]{2}).([0-9]{2}).([0-9]{4}) ([0-9]{2}):([0-9]{2}):([0-9]{2})\)';
$regexes['round'] = '(Aanvaller|Verdediger) (.*?)\s+\[([0-9]:[0-9]{1,3}:[0-9]{1,2})\]';

//Combat Round Regex
$regexes['round_start'] = 'Aanvaller';
$regexes['round_fleet'] = '.*?(Aanvaller|Verdediger) ([^\n\r]*?)(\s*?\[([0-9]:[0-9]{1,3}:[0-9]{1,2})\])?';
$regexes['round_fleet'] .= '(\s*?Wapens: ([0-9]{0,2})0% Schilden: ([0-9]{0,2})0% Pantser: ([0-9]{0,2})0%)?\s*';
$regexes['round_fleet'] .= '(Soort([A-Za-z.-\s]*)\s*' . 'Aantal([0-9.\s]*).*?Wapens' . '|vernietigd.)\s*';
$regexes['round_fleet'] .= '.*?(?=Aanvaller|Verdediger)';
$regexes['battle_end'] = 'vernietigd.';
$regexes['attacker'] = 'aanvaller';

//Combat ships Regex
$regexes['ship_sc'] = 'k.vrachtschip';
$regexes['ship_lc'] = 'g.vrachtschip';
$regexes['ship_lf'] = 'l.gevechtsschip';
$regexes['ship_hf'] = 'z.gevechtsschip';
$regexes['ship_xx'] = 'kruiser';
$regexes['ship_bs'] = 'slagschip';
$regexes['ship_col'] = 'kol.schip.';
$regexes['ship_rec'] = 'recycler';
$regexes['ship_spio'] = 'spionagesonde';
$regexes['ship_bb'] = 'bommenwerper';
$regexes['ship_sol'] = 'zonne-energiesatelliet';
$regexes['ship_des'] = 'vernietiger';
$regexes['ship_rip'] = 'sterdesdoods';
$regexes['ship_bc'] = 'interceptor.';

//Combat defences Regex
$regexes['def_rl'] = 'raketten';
$regexes['def_ll'] = 'k.laser';
$regexes['def_hl'] = 'g.laser';
$regexes['def_gauss'] = 'gauss';
$regexes['def_ion'] = 'ion.k';
$regexes['def_plasma'] = 'plasma';
$regexes['def_ssd'] = 'k.koepel';
$regexes['def_lsd'] = 'g.koepel';

//Combat Result Regex
$regexes['won'] = 'gewonnen';
$regexes['won_attacker'] = 'aanvaller heeft het gevecht';
$regexes['steals'] = 'De aanvaller steelt\s*?([0-9.]*) metaal, ([0-9.]*) kristal en ([0-9.]*) deuterium';

$regexes['lost_attacker'] = 'aanvaller heeft een totaal van ([0-9.]*) eenheden verloren.';
$regexes['lost_defender'] = 'verdediger heeft een totaal van ([0-9.]*) eenheden verloren.';
$regexes['debris'] = 'in de ruimte zweven nu ([0-9.]*) Metaal en ([0-9.]*) Kristal.';
$regexes['moon_chance'] = 'De kans dat een maan ontstaat uit het puin is ([0-9]{1,2})';
$regexes['moon'] = 'De enorme hoeveelheden van rondzwevende metaal- en kristaldeeltjes trekken elkaar aan ';
$regexes['moon'] .= 'en vormen langzaam een maan, in een baan rond de planeet.';
