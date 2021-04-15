import logo2 from '../img/logo2.PNG';
import photo from '../img/pobrane (1).jpg'
import '../css/bills.css';
import {FontAwesomeIcon} from '@fortawesome/react-fontawesome'
import {faBars, faCheckCircle, faPlus} from '@fortawesome/free-solid-svg-icons'



function Logo() {
    return (
        <img className={"logo"} src={logo2} alt="logo"/>
    )
}

function HamburgerIcon() {
    return <FontAwesomeIcon icon={faBars}/>
}


const topBar = (
    <div className={"top-nav"}>
        <Logo/>
        <HamburgerIcon/>
    </div>
)

function SubPage(pros){
    return (
        <div className={"subpage"}>
            <span>{pros.title}</span>
        </div>
    )
}
function Item(){
    return (
        <div className={"item"}>
            <span>item name</span>
            <FontAwesomeIcon icon={faCheckCircle}/>
            <img src={photo} alt=""/>
            <img src={photo} alt=""/>
        </div>
    )
}
function FridgeContainer(){
    return (

            <div className={"fridge-container"}>
                <ItemsContainer/>
                <ItemAdd/>
            </div>
    )
}
function ItemsContainer(){
    return (
            <div className={"items-container"}>
                <Item/>
                <Item/>
                <Item/>

            </div>

    )
}

function ItemAdd(){
    return (
        <div className={"add-bill"}>
            <input placeholder={"type bill..."} type="text"/>
            <FontAwesomeIcon icon={faPlus}/>
        </div>
    )
}



function OnBoard() {
    return (
        <div>
            <nav>
                {topBar}
                <SubPage title = {"Shared Fridge"}/>
            </nav>
            <main>
                <FridgeContainer/>
            </main>

        </div>
    );
}

export default OnBoard;
// set "SKIP_PREFLIGHT_CHECK=true" && npm start
