document.addEventListener("DOMContentLoaded", function () {
  // Smooth scrolling
  const navLinks = document.querySelectorAll(".nav__links .link a");

  navLinks.forEach((link) => {
      link.addEventListener("click", smoothScroll);
  });

  function smoothScroll(e) {
      e.preventDefault();

      const targetId = this.getAttribute("href");
      const targetSection = document.querySelector(targetId);
      const sectionOffset = targetSection.offsetTop - 50;

      window.scrollTo({
          top: sectionOffset,
          behavior: "smooth",
      });
  }

  // Text typing effect
  const texts = [
      "HELLO.",
      "BONJOUR.",
      "MARI MASO.",
      "안녕하세요.",
      "こんにちは."
  ];

  const textElement = document.getElementById('text');

  let index = 0; 
  let charIndex = 0; 
  let isDeleting = false; 

  function typeText() {
      const currentText = texts[index];
      if (isDeleting) {
          textElement.textContent = currentText.substring(0, charIndex - 1);
          charIndex--;
      } else {
          textElement.textContent = currentText.substring(0, charIndex + 1);
          charIndex++;
      }

      if (!isDeleting && charIndex === currentText.length) {
          isDeleting = true;
          setTimeout(typeText, 1500); 
      } else if (isDeleting && charIndex === 0) {
          isDeleting = false;
          index = (index + 1) % texts.length; 
          setTimeout(typeText, 500); 
      } else {
          setTimeout(typeText, isDeleting ? 50 : 150); 
      }
  }

  typeText();
});
