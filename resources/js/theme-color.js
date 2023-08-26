const themeToggleDarkIcon = document.querySelector("#theme-toggle-dark-icon");
const themeToggleLightIcon = document.querySelector("#theme-toggle-light-icon");

export const loadColorTheme = () => {
    if (
        localStorage.theme === "dark" ||
        (!("theme" in localStorage) &&
            window.matchMedia("(prefers-color-scheme: dark)").matches)
    ) {
        themeToggleLightIcon.classList.remove("hidden");
        document.documentElement.classList.add("dark");
    } else {
        themeToggleDarkIcon.classList.remove("hidden");
        document.documentElement.classList.remove("dark");
    }
};

export const toggleColorTheme = () => {
    themeToggleLightIcon.classList.toggle("hidden");
    themeToggleDarkIcon.classList.toggle("hidden");

    if (localStorage.theme === "dark") {
        localStorage.theme = "light";
        document.documentElement.classList.remove("dark");
    } else {
        localStorage.theme = "dark";
        document.documentElement.classList.add("dark");
    }
};
