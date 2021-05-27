import logo2 from '../img/logo2.PNG';

import '../css/App.css';
import {FontAwesomeIcon} from '@fortawesome/react-fontawesome'
import {faBars, faHome, faTimes} from '@fortawesome/free-solid-svg-icons'
import {useHistory} from "react-router";
import axios from "axios";
import { Link } from "react-router-dom";
import {useState} from "react";
import RightBar from "./RightBar";
import TopBar from "./TopBar";



function HamburgerIcon() {
    return <FontAwesomeIcon icon={faBars} />
}

function HouseIcon() {
    return <FontAwesomeIcon icon={faHome}/>
}


function registerFunction(){

    let variable={
        "email": "mk@gmail.com",
        "password":"123"
    };
    {axios.post("https://127.0.0.1:8000/register", JSON.stringify(variable)).then(r =>console.log(r) )}
}
function Login(){
    const history = useHistory();
    return (
        <div className={"login-container"}>
            <div className={"option-container"}>
                <a  onClick={() => history.push('/login') } >login</a>
                <a onClick={() => history.push('/register') }className={"chosen"}>signup</a>
            </div>
            <div className={"input-container"}>
                <input placeholder={"email"} type="text"/>
                <input placeholder={"password"} type="text"/>
                <input placeholder={"password"} type="text"/>
            </div>
            <div className={"button-container"}>
                <button onClick={registerFunction}>sign up</button>
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

