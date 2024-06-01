function toggleAnswer(element) {
    const content = element.nextElementSibling;
    if (content.style.display === "block") {
    content.style.display = "none";
    } else {
    content.style.display = "block";
    }
    }
    
    function filterQuestions() {
    let input = document.getElementById('searchBar');
    let filter = input.value.toUpperCase();
    let faqs = document.querySelectorAll('.faq-item');
    
    faqs.forEach(faq => {
    let question = faq.querySelector("h3");
    let answer = faq.querySelector(".answer");
    if (question.innerHTML.toUpperCase().indexOf(filter) > -1 || answer.innerHTML.toUpperCase().indexOf(filter) > -1) {
    faq.style.display = "";
    } else {
    faq.style.display = "none";
    }
    });
    }