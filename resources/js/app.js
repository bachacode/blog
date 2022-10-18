import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
import Choices from 'choices.js';
window.choices = (element) => {
    return new Choices(element, {
        maxItemCount: 4, removeItemButton: true,
    });
}
Alpine.plugin(focus);
window.Alpine = Alpine;
Alpine.start();
//Create multi-select

