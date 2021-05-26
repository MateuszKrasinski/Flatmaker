import logo2 from '../img/logo2.PNG';

import '../css/App.css';
import {FontAwesomeIcon} from '@fortawesome/react-fontawesome'
import {faBars, faHome} from '@fortawesome/free-solid-svg-icons'
import {useHistory} from "react-router";



function Logo() {
    return <img className={"logo"} src={logo2} alt="logo"/>
}

function HamburgerIcon() {
    return <FontAwesomeIcon icon={faBars}/>
}

function HouseIcon() {
    return <FontAwesomeIcon icon={faHome}/>
}

const topBar = (
    <div className={"top-nav"}>
        <Logo/>
        <HamburgerIcon/>
    </div>
)

function Register(){
    const history = useHistory();
    return (
        <div className={"login-container"}>
            <div className={"option-container"}>
                <a  onClick={() => history.push('/login') } >login</a>
                <a onClick={() => history.push('/register') } className={"chosen"}>signup</a>
            </div>
            <div className={"input-container"}>
                <input placeholder={"email"} type="text"/>
                <input placeholder={"password"} type="text"/>
                <input placeholder={"again password"} type="text"/>
            </div>
            <div className={"button-container"}>
                <button>sign up</button>
            </div>

        </div>
    )
}

function OnBoard() {
    return (
        <div>
            <nav>
                {topBar}
            </nav>
            <main>
                <Register/>
            </main>

        </div>
    );
}

export default OnBoard;

