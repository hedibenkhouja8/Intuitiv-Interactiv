<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerPyH6RYp\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerPyH6RYp/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerPyH6RYp.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerPyH6RYp\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerPyH6RYp\App_KernelDevDebugContainer([
    'container.build_hash' => 'PyH6RYp',
    'container.build_id' => 'c6cbe7e1',
    'container.build_time' => 1648662453,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerPyH6RYp');