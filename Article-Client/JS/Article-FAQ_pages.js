const articlePages = {};
articlePages.base_api = "http://localhost/Article_FAQ/Article-Server/Apis/v1/";


articlePages.get_data = async function(url) {
    try {
        const response = await axios.get(url);
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

articlePages.load_signup = async function() {
    
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
            console.log("response " + response);
            if (response.status === "Succeed") {
                alert("Logged in Successfully!");
                window.location.href = "./home.html";
            } else
                alert("Invalid credentials, Try again");
        } else
        alert("Filling the credentials is required");
    });
}
