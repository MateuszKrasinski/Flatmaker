import photo from '../img/person1.jpg'
import '../css/bills.css';
import {FontAwesomeIcon} from '@fortawesome/react-fontawesome'
import {faBars, faCheckCircle, faMoneyBillAlt, faPlus} from '@fortawesome/free-solid-svg-icons'
import TopBar from "./TopBar";
import RightBar from "./RightBar";


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
            <FontAwesomeIcon icon={faMoneyBillAlt}/>
            <FontAwesomeIcon icon={faCheckCircle}/>
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
        <div className={'background-white'}>
            <nav>
                <TopBar/>
                <SubPage title = {"Shopping List"}/>
            </nav>
            <main>
                <FridgeContainer/>
            </main>
            <RightBar/>
        </div>
    );
}

export default OnBoard;
// set "SKIP_PREFLIGHT_CHECK=true" && npm start
