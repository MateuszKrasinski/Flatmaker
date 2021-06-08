
import '../css/App.css';
import {useState} from "react";
import RightBar from "./RightBar";
import TopBar from "./TopBar";
import {register} from "./Api";




function Login() {
    const [name, setName] = useState("");
    const [password, setPassword] = useState("");
    const [repassword, setRepassword] = useState("");
    const [setStatus] = useState();
    const tryRegister = async () => {
        if (password !== repassword) return;
        const response = await register({
            email: name,
            password: password,
            csrf_token:'authenticate'
        });
        setStatus(response);
        console.log(name);
        console.log(response);
    };
    return (
        <div className={"login-container"}>
            <div className={"option-container"}>
                <a href={"/login"}>login</a>
                <a href={"/register"} className={"chosen"}>signup</a>
            </div>
            <div className={"input-container"}>
                <input
                    type="text"
                    placeholder="Name"
                    onChange={(e) => setName(e.target.value)}
                ></input>
                <input
                    type="password"
                    placeholder="passoword"
                    onChange={(e) => setPassword(e.target.value)}
                ></input>
                <input
                    type="password"
                    placeholder="repassoword"
                    onChange={(e) => setRepassword(e.target.value)}
                ></input>
            </div>
            <div className={"button-container"}>
                <button onClick={tryRegister}>sign up</button>
            </div>

        </div>
    )
}


function OnBoard() {
    return (
        <div>
            <nav className>
                <TopBar/>
            </nav>
            <main>
                <Login/>
            </main>
            <RightBar/>
        </div>
    );
}

export default OnBoard;

