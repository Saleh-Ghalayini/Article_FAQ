const articlePages = {};
articlePages.base_api = "http://localhost/Article_FAQ/Article-Server/Apis/v1/";


articlePages.get_data = async function(url, data = null) {
    try {
        const response = await axios.get(url, {params: data});
        return response.data;
    }catch(error) {
        console.log(error);
    }
}

articlePages.post_data = async function(url, data) {
    try {
        const response = await axios.post(url, data);
        return response.data;
    }catch(error) {
        console.log(error);
    }
}

articlePages.loadfor = function(page_name) {
    eval("articlePages.load_" + page_name + "();");
}

articlePages.load_faq = async function() {
    const submit_btn = document.getElementById("submit");

    submit_btn.addEventListener("click", async() => {
        const question = document.getElementById("question_input").value;
        const answer = document.getElementById("answer_input").value;

        if(question && answer) {
            const question_info = {
                question: question,
                answer: answer
            };

            const response = await articlePages.get_data(articlePages.base_api + "addQuestion.php", question_info);

                window.location.href = "./home.html";
        } else {
            alert("Filling the credentials is required");
        }
    });
}

articlePages.load_home = async function (searchQuery = "") {
    const cardsContainer = document.querySelector(".cards-container");
    const add_question = document.getElementById("plus-btn");

    let apiUrl = articlePages.base_api + "getQuestion.php";
    if (searchQuery)
        apiUrl += `?question=${encodeURIComponent(searchQuery)}`;

    const response = await articlePages.get_data(apiUrl);
    const questions = response.message || [];

    cardsContainer.innerHTML = "";

    questions.forEach(question => {
        const card = document.createElement("div");
        card.classList.add("card");

        const questionText = document.createElement("p");
        questionText.classList.add("question-text");
        questionText.innerHTML = `<strong>${question.question}</strong><br />`;
        card.appendChild(questionText);

        const answerText = document.createElement("p");
        answerText.classList.add("answer-text");
        answerText.innerHTML = `<br />${question.answer}`;
        card.appendChild(answerText);

        cardsContainer.appendChild(card);
    });

    add_question.addEventListener("click", async() => {
        window.location.href = "./faq.html";
    });

};

document.getElementById("search-btn").addEventListener("click", function () {
    const searchInput = document.getElementById("search-bar").value.trim();
    articlePages.load_home(searchInput);
});
articlePages.load_home();

articlePages.load_signup = async function() {
    const sign_up = document.getElementById("signup-btn");

    sign_up.addEventListener("click", async () => {

        const name = document.getElementById("full-name").value;
        const email = document.getElementById("email").value;
        const password = document.getElementById("password").value;

        if (name && email && password) {
            const signup_info = {
                full_name: name,
                email: email,
                password: password
            };

            const response = await articlePages.get_data(articlePages.base_api + "signup.php", signup_info);
            
            if (response.status === "Succeed") {
                alert("Signed Up Successfully!");
                window.location.href = "./home.html";
            } else {
                alert("Invalid input, Try again");
            }
        } else {
            alert("Filling the credentials is required");
        }
    });
}

articlePages.load_login = async function() {
    const login_btn = document.getElementById("login");
    
    login_btn.addEventListener("click", async () => {

        const email = document.getElementById("email_input").value;
        const password = document.getElementById("password_input").value;

        if(email && password) {
            const credentials = {
                email: email,
                password: password
            };

            const response = await articlePages.post_data(articlePages.base_api + "login.php", credentials);
            if (response.status === "Succeed") {
                alert("Logged in Successfully!");
                window.location.href = "./home.html";
            } else
                alert("Invalid credentials, Try again");
        } else
        alert("Filling the credentials is required");
    });
}
