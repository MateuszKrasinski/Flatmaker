import '../../css/App.css';
import {useState} from "react";
import RightBar from "../components/RightBar";
import TopBar from "../components/TopBar";
import {login} from "../api/Api";
import {useCookies} from "react-cookie";
function Login(){
    const [cookies] = useCookies(['cookie-name']);
    const [name, setName] = useState("");
    const [password, setPassword] = useState("");
    const [setStatus] = useState();
    const tryLogin = async () => {
        console.log(cookies);
        const response = await login({
            password: password,
            email: name,
        });
        setStatus(response);
        console.log(response);
    };
    return (
        <div className={"login-container"}>
            <div className={"option-container"}>
                <a  href={"/login"}  className={"chosen"}>login</a>
                <a href={"/register"}>signup</a>
            </div>
            <div className={"input-container"}>
                <input
                    type="text"
                    placeholder="Name"
                    onChange={(e) => setName(e.target.value)}
                ></input>
                <input
                    type="password"
                    placeholder="password"
                    onChange={(e) => setPassword(e.target.value)}
                ></input>
            </div>
            <div className={"button-container"}>
                <button onClick={tryLogin}>login</button>
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

