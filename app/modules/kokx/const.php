<?php
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