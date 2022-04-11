import axios from "axios";
const API_URL = "https://pks.guidelight.id/api/auth/";
class AuthService {
    login(user) {
        return axios
            .post(API_URL + "login", {
                email: user.email,
                password: user.password,
            })
            .then((response) => {
                if (response.data.data.token) {
                    localStorage.setItem(
                        "user",
                        JSON.stringify(response.data.data.user)
                    );
                }
                return response.data.data.token;
            });
    }
    logout() {
        localStorage.removeItem("user");
    }
    register(user) {
        return axios.post(API_URL + "register", {
            name: user.name,
            username: user.username,
            email: user.email,
            password: user.password,
        });
    }
}
export default new AuthService();
