import {FontAwesomeIcon} from "@fortawesome/react-fontawesome";
import {faBars, faTimes} from "@fortawesome/free-solid-svg-icons";
import {Link} from "react-router-dom";
import {useState} from "react";

function RightBar() {
    const [clicked, setState] = useState(false);
    function handleStatusChange() {
        if(clicked === false){
            setState(true);
            console.log('visible')
        }

        else{
            setState(false);
            console.log('notvisible');
        }

    }
    if (clicked){

        return (<div className={"right-nav"}  style={{backgroundColor: "#f5f5f5"}} >
            <FontAwesomeIcon icon={faTimes} onClick = {handleStatusChange}/>
            <ul>
                <Link to='/shared'>
                    <li onClick={handleStatusChange}>Shared Fridge</li>
                </Link>
                <Link to='/bills'>
                    <li onClick={handleStatusChange}>Bills</li>
                </Link>
                <Link to='/shopping'>
                    <li onClick={handleStatusChange}>Shopping List</li>
                </Link>
                <Link to='/event'>
                    <li onClick={handleStatusChange}>Calendar</li>
                </Link>
                <Link to='/household'>
                    <li onClick={handleStatusChange}>Household</li>
                </Link>
            </ul>
        </div>)
    }
    return (<div className={'right-nav invisible'}>
        <FontAwesomeIcon className={'visible'} icon={faBars} onClick = {handleStatusChange}/>
    </div>)
}
export default RightBar