// Wraps Header and Volunteer Event List into home HomeScreen

import React, { Component } from 'react';
import { View } from 'react-native';
import Header from './header.js';
import VolunteerEventList from './VolunteerEventList.js';
import WelcomeUser from './WelcomeUser';
import GoalBar from './GoalBar.js';
import RecentHistoryHeader from './RecentHistoryHeader.js';
import GoalText from './GoalText.js';

class HomeScreen extends Component {

  constructor(props) {
    super(props);

    this.state = {
      name: ''
    };

    this.fetchData = this.fetchData.bind(this);
  }

  componentWillMount() {
    this.fetchData();
  }

  fetchData(){
    fetch('http://www.aptimage.net/getUserMobile.php')
   .then((response) => response.text()).then((responseJsonFromServer) =>
   {
      //console.log(responseJsonFromServer);
      //obj = JSON.parse(responseJsonFromServer);
      //console.log(obj);
      this.setState({name: responseJsonFromServer});
      //console.log(this.state.name);

    }).catch((error) =>
    {
      console.log('Could not retrieve data.');
      console.error(error);
    });
  }
  render() {
    return (
			<View style={{flex:1}}>
        <View style={{backgroundColor: '#F9F9F9'}}>
          <Header headerText={'vTrak'} />
        	<WelcomeUser name={this.state.name}/>
          <GoalBar />
          <RecentHistoryHeader />
        </View>
        <VolunteerEventList />
      </View>
    )
  }
}

export default HomeScreen;
