import '../css/App.css';
import RightBar from "./RightBar";
import TopBar from "./TopBar";
import {setProfileDetails, getUser} from "./Api";
import React, {useEffect, useState} from "react";

function Login() {
    const [name, setName] = useState("");
    const [surname, setSurname] = useState("");
    const [phone, setPhone] = useState("");
    const [photo, setPhoto] = useState("");
    const [user, setUser] = useState();
    const trySetProfile = async () => {
        const response = await setProfileDetails({
            name: name,
            surname: surname,
            phone: phone,
            photo: photo
        }, 4);
        console.log(response);
    };
    const readUser = async () => {
        const response = await getUser(32);
        setUser(response);
        console.log(user);
    }
    useEffect(() => readUser());
    return (
        <div className={"login-container"}>
            { user&&

            <div className={"input-container"}>
                <img src={user['id_user']['photo']} alt=""/>
                <input
                    type="text"
                    placeholder={user['id_user']['name']}
                    onChange={(e) => setName(e.target.value)}
                ></input>
                <input
                    type="text"
                    placeholder={user['id_user']['surname']}
                    onChange={(e) => setSurname(e.target.value)}
                ></input>
                <input
                    type="text"
                    placeholder={user['id_user']['phone']}
                    onChange={(e) => setPhone(e.target.value)}
                ></input>
                <input
                    type="text"
                    placeholder={user['id_user']['photo']}
                    onChange={(e) => setPhoto(e.target.value)}
                ></input>

            </div>
            }

            <div className={"button-container"}>
                <button onClick={trySetProfile}>setProfile</button>
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

