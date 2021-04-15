import logo2 from '../img/logo2.PNG';

import '../css/App.css';
import {FontAwesomeIcon} from '@fortawesome/react-fontawesome'
import {faBars, faHome} from '@fortawesome/free-solid-svg-icons'



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

function Login(){
    return (
        <div className={"login-container"}>
            <div className={"option-container"}>
                <p className={"chosen"}>login</p>
                <p>signup</p>
            </div>
            <div className={"input-container"}>
                <input placeholder={"email"} type="text"/>
                <input placeholder={"password"} type="text"/>
            </div>
            <div className={"button-container"}>
                <button>login</button>
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
                <Login/>
            </main>

        </div>
    );
}

export default OnBoard;

