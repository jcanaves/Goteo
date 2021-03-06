<?php
/*
 *  Copyright (C) 2012 Platoniq y Fundación Fuentes Abiertas (see README for details)
 *	This file is part of Goteo.
 *
 *  Goteo is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU Affero General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  Goteo is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU Affero General Public License for more details.
 *
 *  You should have received a copy of the GNU Affero General Public License
 *  along with Goteo.  If not, see <http://www.gnu.org/licenses/agpl.txt>.
 *
 */

use Goteo\Library\Text,
    Goteo\Core\ACL;

$translator = ACL::check('/translate') ? true : false;
?>
<a href="/admin/blog/add" class="button red"><?php echo Text::_("Nueva entrada"); ?></a>

<div class="widget board">
    <?php if (!empty($this['posts'])) : ?>
    <table>
        <thead>
            <tr>
                <td><!-- <?php echo Text::_("Edit"); ?> --></td>
                <th><?php echo Text::_("Título"); ?></th> <!-- title -->
                <th><?php echo Text::_("Fecha"); ?></th> <!-- date -->
                <th><?php echo Text::_("Publicado"); ?></th>
                <th><?php echo Text::_("En portada"); ?></th>
                <th><?php echo Text::_("Al pie"); ?></th>
                <th><!-- <?php echo Text::_("Traducir"); ?>--></th>
                <td><!-- <?php echo Text::_("Remove"); ?> --></td>
                <td></td><!-- preview -->
            </tr>
        </thead>

        <tbody>
            <?php foreach ($this['posts'] as $post) : ?>
            <tr>
                <td><a href="/admin/blog/edit/<?php echo $post->id; ?>">[<?php echo Text::_("Editar"); ?>]</a></td>
                <td><?php echo $post->title; ?></td>
                <td><?php echo $post->date; ?></td>
                <td><?php echo $post->publish ? Text::_("Sí") : ''; ?></td>
                <td><?php echo $post->home ? Text::_("Sí") : ''; ?></td>
                <td><?php echo $post->footer ? Text::_("Sí") : ''; ?></td>
                <?php if ($translator) : ?>
                <td><a href="/translate/post/edit/<?php echo $post->id; ?>" >[<?php echo Text::_("Traducir"); ?>]</a></td>
                <?php endif; ?>
                <td><a href="/admin/blog/remove/<?php echo $post->id; ?>" onclick="return confirm('<?php echo Text::_("Seguro que deseas eliminar este registro?"); ?>');">[<?php echo Text::_("Quitar"); ?>]</a></td>
                <td><a href="/blog/<?php echo $post->id; ?>?preview=<?php echo $_SESSION['user']->id ?>" target="_blank">[<?php echo Text::_("Ver publicado"); ?>]</a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>

    </table>
    <?php else : ?>
    <p><?php echo Text::_("No se han encontrado registros"); ?></p>
    <?php endif; ?>
</div>