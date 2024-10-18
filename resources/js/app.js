import './bootstrap';
import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm.js'
import anchor from '@alpinejs/anchor'

Alpine.plugin(anchor)

Livewire.start()