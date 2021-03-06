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
 *   This program is based on the Kokx's CR Converter � 2009 kokx: https://github.com/kokx/kokx-converter
 *   
 *   This file is not part of the original program and therefore it only inherits this copyright: Copyright (C) 2014 Klaas Van Parys
 */
?>	
	<head>
		<base href="<?= __BASE_URL ?>" />
		<meta charset="UTF-8">
		<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
		
		<meta name="description" content="An OGame combat report converter, OGotcha allows you to convert your combat reports so you can post them on the boards">
		<meta name="keywords" content="ogame, gameforge, universeview, warsaalk, ogotcha, combat report, converter, kokx, origin, cr converter, ogame origin, ogotcha converter">
		
		<link rel="canonical" href="http://converter.dijkman-winters.nl/">
		<title><?= $self->getDict()->getVal("OGotcha") ?></title>
		<?= $self->get_value('css'); ?>
		<?= $self->get_value('scripts_top'); ?>
	</head>