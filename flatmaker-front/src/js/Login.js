import '../css/App.css';
import {FontAwesomeIcon} from '@fortawesome/react-fontawesome'
import {faBars, faHome, faTimes} from '@fortawesome/free-solid-svg-icons'
import {useHistory} from "react-router";
import {useState} from "react";
import RightBar from "./RightBar";
import TopBar from "./TopBar";
import {login} from "./Api";
import {useCookies} from "react-cookie";
function Login(){
    const [cookies, setCookie, removeCookie] = useCookies(['cookie-name']);
    const history = useHistory();
    const [name, setName] = useState("");
    const [password, setPassword] = useState("");
    const [response, setStatus] = useState();
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
                <a  onClick={() => history.push('/login') } className={"chosen"}>login</a>
                <a onClick={() => history.push('/register') }>signup</a>
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

