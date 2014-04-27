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

define( '__KOKX_BASE' 		, __MODULES 	. 'kokx/' 		);
define( '__KOKX_MODEL' 		, __KOKX_BASE 	. 'model/' 		);
define( '__KOKX_READER' 	, __KOKX_BASE 	. 'reader/' 	);
define( '__KOKX_READERS' 	, __KOKX_READER . 'readers/'	);
define( '__KOKX_REGEX' 		, __KOKX_READER . 'regex/' 		);
define( '__KOKX_RENDERER' 	, __KOKX_BASE 	. 'renderer/' 	);
define( '__KOKX_SERVICE' 	, __KOKX_BASE 	. 'service/' 	);

include __KOKX_MODEL . 'CombatReport' 	. $phpExt;
include __KOKX_MODEL . 'CombatRound' 	. $phpExt;
include __KOKX_MODEL . 'DeuteriumCosts' . $phpExt;
include __KOKX_MODEL . 'Fleet' 			. $phpExt;
include __KOKX_MODEL . 'HarvestReport' 	. $phpExt;
include __KOKX_MODEL . 'Raid' 			. $phpExt;
include __KOKX_MODEL . 'Ship' 			. $phpExt;

include __KOKX_READERS . 'CombatReport' 	. $phpExt;
include __KOKX_READERS . 'DeuteriumCosts'	. $phpExt;
include __KOKX_READERS . 'HarvestReport' 	. $phpExt;
include __KOKX_READERS . 'Raid' 			. $phpExt;

include __KOKX_RENDERER . 'RendererHelper' . $phpExt;
include __KOKX_RENDERER . 'Renderer' . $phpExt;

include __KOKX_SERVICE . 'CombatReport' . $phpExt;

include 'kokx' . $moduleExt;