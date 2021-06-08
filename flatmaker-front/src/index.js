import React from 'react';
import ReactDOM from 'react-dom';

import {BrowserRouter as Router, Route} from "react-router-dom";

import Bills from "./js/Bills";
import OnBoard from "./js/OnBoard";
import Login from './js/Login.js';
import SharedFridge from "./js/SharedFridge";
import Event from "./js/Event";
import Register from "./js/Register";
import ShoppingList from "./js/ShoppingList";
import Household from "./js/Household";
import SetProfile from "./js/SetProfile";
import Groups from "./js/Groups";

import MediaQuery from 'react-responsive'
import OnBoardMob from "./js/OnBoardMob";

ReactDOM.render(
    <Router>
        <Route exact path="/">
                <OnBoard/>
        </Route>
        <Route exact path="/login">
                <Login/>
        </Route>
        <Route exact path="/register">
            <Register/>
        </Route>
        <Route path="/shared">
            <SharedFridge/>
        </Route>
        <Route path="/bills">
            <Bills/>
        </Route>
        <Route path="/event">
            <Event/>
        </Route>
        <Route path="/shopping">
            <ShoppingList/>
        </Route>
        <Route path="/household">
            <Household/>
        </Route>
        <Route path="/setProfile">
            <SetProfile/>
        </Route>
        <Route path="/groups">
            <Groups/>
        </Route>
    </Router>,
    document.querySelector('body')
);

