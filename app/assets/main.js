(() => {
  function copyText(text) {
    if (navigator.clipboard && navigator.clipboard.writeText) {
      return navigator.clipboard.writeText(text);
    }

    const area = document.createElement("textarea");
    area.value = text;
    area.setAttribute("readonly", "");
    area.style.position = "fixed";
    area.style.left = "-9999px";
    document.body.appendChild(area);
    area.select();
    document.execCommand("copy");
    area.remove();
    return Promise.resolve();
  }

  function showToast(value) {
    const toast = document.getElementById("toast");
    const toastValue = document.getElementById("toastValue");
    if (!toast) return;

    if (toastValue) {
      toastValue.textContent = value;
    }

    toast.classList.add("show", "center-popup");
    window.clearTimeout(window.mineacleToastTimer);
    window.mineacleToastTimer = window.setTimeout(() => {
      toast.classList.remove("show", "center-popup");
    }, 2200);
  }

  document.querySelectorAll("[data-copy-ip]").forEach((button) => {
    button.addEventListener("click", () => {
      const value = button.getAttribute("data-copy-ip") || "mineacle.net";
      copyText(value).then(() => showToast(value));
    });
  });

  const header = document.getElementById("siteHeader");
  const toggle = document.querySelector(".mobile-nav-toggle");
  const nav = document.getElementById("mainNav");

  if (header && toggle && nav) {
    const closeMenu = () => {
      header.classList.remove("mobile-open");
      document.body.classList.remove("mobile-nav-open");
      toggle.setAttribute("aria-expanded", "false");
      toggle.setAttribute("aria-label", "Open navigation");
    };

    toggle.addEventListener("click", () => {
      const open = header.classList.toggle("mobile-open");
      document.body.classList.toggle("mobile-nav-open", open);
      toggle.setAttribute("aria-expanded", open ? "true" : "false");
      toggle.setAttribute("aria-label", open ? "Close navigation" : "Open navigation");
    });

    nav.querySelectorAll("a").forEach((link) => {
      link.addEventListener("click", closeMenu);
    });

    document.addEventListener("keydown", (event) => {
      if (event.key === "Escape") closeMenu();
    });

    window.addEventListener("resize", () => {
      if (window.innerWidth > 980) closeMenu();
    });
  }
})();
