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


function loginFunction(){
    let variable={
        "email": "string",
        "password":'1234',
    };
    {axios.post("https://127.0.0.1:8000/login",variable).then(r =>console.log(r) )}
}
function Login(){
    const history = useHistory();
    return (
        <div className={"login-container"}>
            <div className={"option-container"}>
                <a  onClick={() => history.push('/login') } className={"chosen"}>login</a>
                <a onClick={() => history.push('/register') }>signup</a>
            </div>
            <div className={"input-container"}>
                <input placeholder={"email"} type="text"/>
                <input placeholder={"password"} type="text"/>
                <input placeholder={"password"} type="text"/>
            </div>
            <div className={"button-container"}>
                <button onClick={loginFunction}>login</button>
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

