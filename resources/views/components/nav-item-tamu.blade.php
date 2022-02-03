@props(['link', 'label'])

<?php
    $active = $link == url()->current();
?>

</li>
<li class="nav-item {{ $active ? ' active':'' }}">
<a class="nav-link" href="<?= $link ?>">{{ $label }}</a>
</li>
