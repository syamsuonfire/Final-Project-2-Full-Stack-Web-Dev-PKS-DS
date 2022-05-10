import axios from "axios";
const API_URL = "https://backendexample.sanbersy.com/api/";
class AuthService {
    login(user) {
        return axios
            .post(API_URL + "user-login", {
                email: user.email,
                password: user.password,
            })
            .then((response) => {
                if (response.data.token) {
                    localStorage.setItem(
                        "user",
                        JSON.stringify(response.data.user)
                    );
                }
                return response.data.token;
            });
    }
    logout() {
        localStorage.removeItem("user");
    }
    register(user) {
        return axios.post(API_URL + "register", {
            name: user.name,
            email: user.email,
            password: user.password,
        });
    }
}
export default new AuthService();
