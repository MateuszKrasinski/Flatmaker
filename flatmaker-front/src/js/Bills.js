import logo2 from '../img/logo2.PNG';
import photo from '../img/pobrane (1).jpg'
import '../css/bills.css';
import {FontAwesomeIcon} from '@fortawesome/react-fontawesome'
import {faBars, faArrowRight, faPlus} from '@fortawesome/free-solid-svg-icons'




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
function Bill(pros){
    return (
        <div className={"bill"}>
            <p> {pros.user}</p>
            <p>{pros.count}</p>
        </div>
    )
}

let arr = {user: "Jan", count: "12$"}
function BillsStory(pros){
    return (
        <div className={"bills-story"}>
                <Bill user = {arr.user} count ={arr.count}/>
        </div>
    )
}
function BillAdd(){
    return (
        <div className={"add-bill"}>
            <input placeholder={"type bill..."} type="text"/>
            <FontAwesomeIcon icon={faPlus}/>
        </div>
    )
}

function UserProfile(pros){
    return(
        <div className={"user-profile"}>
            <img src={photo} alt=""/>
            <h1> spent:    {pros.count}$</h1>
        </div>
    )

}

function BillContainer(){
    return (
        <div className={"bills-container"}>
            <BillsStory/>
            <BillAdd/>
        </div>
    )
}

function SettleButton(){
    return (
        <button className={"settle-button"}> Settle</button>
    )
}
function SummaryBills(){
    return(
        <div className={"summary-bills"}>
            <div className={'money-to-pay'}>
                <FontAwesomeIcon icon={faArrowRight}/>
                <span>30$</span>
            </div>
        </div>
    )
}
function SubPage(pros){
    return (
        <div className={"subpage"}>
            <span>{pros.title}</span>
        </div>
    )
}
function OnBoard() {
    return (
        <div>
            <nav>
                {topBar}
                <SubPage title = {"BILLS"}/>
            </nav>
            <main>
                <UserProfile count={12}/>
                <div className={"middle-container"}>
                    <BillContainer/>
                    <SummaryBills/>
                    <SettleButton/>
                </div>
                <UserProfile count={25}/>
            </main>

        </div>
    );
}

export default OnBoard;
// set "SKIP_PREFLIGHT_CHECK=true" && npm start
