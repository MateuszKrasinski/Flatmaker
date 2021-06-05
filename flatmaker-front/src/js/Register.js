import logo2 from '../img/logo2.PNG';

import '../css/App.css';
import {FontAwesomeIcon} from '@fortawesome/react-fontawesome'
import {faBars, faHome, faTimes} from '@fortawesome/free-solid-svg-icons'
import {useHistory} from "react-router";
import {useState} from "react";
import RightBar from "./RightBar";
import TopBar from "./TopBar";
import {register} from "./Api";


function HamburgerIcon() {
    return <FontAwesomeIcon icon={faBars}/>
}

function HouseIcon() {
    return <FontAwesomeIcon icon={faHome}/>
}


function Login() {
    const history = useHistory();
    const [name, setName] = useState("");
    const [password, setPassword] = useState("");
    const [repassword, setRepassword] = useState("");
    const [response, setStatus] = useState();
    const tryRegister = async () => {
        if (password !== repassword) return;
        const response = await register({
            email: name,
            password: password,
        });
        setStatus(response);
        console.log(name);
        console.log(response);
    };
    return (
        <div className={"login-container"}>
            <div className={"option-container"}>
                <a onClick={() => history.push('/login')}>login</a>
                <a onClick={() => history.push('/register')} className={"chosen"}>signup</a>
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

