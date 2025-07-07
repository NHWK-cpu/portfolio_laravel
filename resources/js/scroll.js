
  const observer_bottom = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        const el = entry.target;
        if (entry.isIntersecting) {
          el.classList.add("opacity-100", "translate-y-0");
          el.classList.remove("opacity-0", "translate-y-8");
        } else {
          el.classList.remove("opacity-100", "translate-y-0");
          el.classList.add("opacity-0", "translate-y-8");
        }
      });
    },
    {
      threshold: 0.5,
      rootMargin: '0px 0px -20% 0px',
    }
  );

  const observer_left = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        const el = entry.target;
        if (entry.isIntersecting) {
          el.classList.add("opacity-100", "translate-x-0");
          el.classList.remove("opacity-0", "-translate-x-8");
        } else {
          el.classList.remove("opacity-100", "translate-x-0");
          el.classList.add("opacity-0", "-translate-x-8");
        }
      });
    },
    {
      threshold: 0.5,
      rootMargin: '0px 0px -20% 0px',
    }
  );

  const observer_right = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        const el = entry.target;
        if (entry.isIntersecting) {
          el.classList.add("opacity-100", "translate-x-0");
          el.classList.remove("opacity-0", "translate-x-8");
        } else {
          el.classList.remove("opacity-100", "translate-x-0");
          el.classList.add("opacity-0", "translate-x-8");
        }
      });
    },
    {
      threshold: 0.5,
      rootMargin: '0px 0px -20% 0px',
    }
  );

  const observer_top = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        const el = entry.target;
        if (entry.isIntersecting) {
          el.classList.add("opacity-100", "translate-y-0");
          el.classList.remove("opacity-0", "-translate-y-8");
        } else {
          el.classList.remove("opacity-100", "translate-y-0");
          el.classList.add("opacity-0", "-translate-y-8");
        }
      });
    },
    {
      threshold: 0.5,
      rootMargin: '0px 0px -20% 0px',
    }
  );

  document.querySelectorAll('.box-up').forEach((box) => observer_bottom.observe(box));
  document.querySelectorAll('.box-right').forEach((box) => observer_left.observe(box));
  document.querySelectorAll('.box-left').forEach((box) => observer_right.observe(box));
  document.querySelectorAll('.box-down').forEach((box) => observer_top.observe(box));