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
        return (<div className={"right-nav"}>
            <FontAwesomeIcon icon={faTimes} onClick = {handleStatusChange}/>
            <ul>
                <Link to='/shared'>
                    <li onClick={handleStatusChange}>Shared Fridge</li>
                </Link>
                <Link to='/bills'>
                    <li onClick={handleStatusChange}>Bills</li>
                </Link>
                <Link to='/list'>
                    <li onClick={handleStatusChange}>Shopping List</li>
                </Link>
                <Link to='/event'>
                    <li onClick={handleStatusChange}>Calendar</li>
                </Link>
            </ul>
        </div>)
    }
    return (<div className={"right-nav pink"} >
        <FontAwesomeIcon icon={faBars} onClick = {handleStatusChange}/>
    </div>)
}
export default RightBar