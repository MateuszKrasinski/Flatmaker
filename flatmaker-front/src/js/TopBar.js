import logo2 from "../img/logo2.PNG";
import {Link} from "react-router-dom";


function TopBar(){
    return(
        <div className={"top-nav"}>
            <Link to='/'>
                <img className={"logo"} src={logo2} alt="logo"/>
            </Link>
        </div>
    )
}

export default TopBar