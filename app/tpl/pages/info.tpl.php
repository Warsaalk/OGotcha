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
?>		
		<div id="infopage" class="outer-block">
			<div class="inner-block">
				<h1><?= $self->getDict()->getVal("Info/Help") ?></h1>
				<ul>
					<li>
						<h2><?= $self->getDict()->getVal("Copy Paste your battle report") ?></h2>
						<p><?= $self->getDict()->getVal("copy-paste-battlereport-p1") ?></p>
						<p><?= $self->getDict()->getVal("copy-paste-battlereport-p2") ?></p>
					</li>
					<li>
						<h2><?= $self->getDict()->getVal("Add your raids") ?></h2>
						<p><?= $self->getDict()->getVal("copy-paste-raids-p1") ?></p>
						<p><?= $self->getDict()->getVal("copy-paste-raids-p2") ?></p>
					</li>
					<li>
						<h2><?= $self->getDict()->getVal("Add your harvest reports") ?></h2>
						<p><?= $self->getDict()->getVal("copy-paste-harvest") ?></p>
					</li>
					<li>
						<h2><?= $self->getDict()->getVal("Enter your deuterium costs") ?></h2>
						<p><?= $self->getDict()->getVal("copy-paste-deuterium-p1") ?></p>
						<p><?= $self->getDict()->getVal("copy-paste-deuterium-p2") ?></p>
					</li>
				</ul>
			</div>
		</div>
