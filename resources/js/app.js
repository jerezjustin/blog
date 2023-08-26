import "./bootstrap";
import { loadColorTheme, toggleColorTheme } from "./theme-color";

import "flowbite";

if (!window.loadColorTheme) {
    window.loadColorTheme = loadColorTheme;
}

if (!window.toggleColorTheme) {
    window.toggleColorTheme = toggleColorTheme;
}

window.loadColorTheme();
