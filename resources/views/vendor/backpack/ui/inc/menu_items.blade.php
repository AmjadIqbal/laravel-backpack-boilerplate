{{-- This file is used for menu items by any Backpack v6 theme --}}
<x-backpack::menu-item title="Dashboard" icon="la la-home" :link="backpack_url('dashboard')" />
<x-backpack::menu-item title="Pages" icon="la la-file" :link="backpack_url('pages')" />
<x-backpack::menu-item title='Menu' icon='la la-list' :link="backpack_url('menu-item')" />
<x-backpack::menu-dropdown title="Authentication" icon="la la-user">
    <x-backpack::menu-dropdown-item title="Users" icon="la la-user" :link="backpack_url('user')" />
    <x-backpack::menu-dropdown-item title="Roles" icon="la la-group" :link="backpack_url('role')" />
    <x-backpack::menu-dropdown-item title="Permissions" icon="la la-key" :link="backpack_url('permission')" />
</x-backpack::menu-dropdown>