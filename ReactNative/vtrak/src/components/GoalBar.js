import React, { Component } from 'react';
import { View, Text, StyleSheet } from 'react-native';

class GoalBar extends Component {
  constructor(props) {
    super(props);

    this.state = {
      goal: '',
      hours: '',
      blueBar: '',
      greyBar: '',
      timer: null
    };

    this.fetchData = this.fetchData.bind(this);
  }

  componentWillMount() {
    this.fetchData();
    let timer = setInterval(this.fetchData, 5000);
    this.setState({timer});
  }

  fetchData() {
    fetch('http://www.aptimage.net/getGBContentMobile.php')
   .then((response) => response.text()).then((responseJsonFromServer) =>
    {
      // console.log(responseJsonFromServer);
      obj = JSON.parse(responseJsonFromServer);
      // console.log(obj.hours);
      // console.log(obj.goal);
      this.setState({hours: obj.hours});
      this.setState({goal: obj.goal});
      this.setState({blueBar: obj.blueBar});
      this.setState({greyBar: obj.greyBar});
      // console.log(this.state.blueBar);
    }).catch((error) =>
    {
      console.log('Could not retrieve hours.');
      console.error(error);
    });
  }

  render() {
    return (
      <View style={styles.viewStyle}>
      {/* <Text> Goal </Text> */}
      <View style={styles.colorFillStyle}></View>
      <View style={styles.color2FillStyle}></View>
      <Text style={styles.textStyle}> {this.state.hours} / {this.state.goal} </Text>
      </View>
    );
  }
}

const styles = StyleSheet.create({
  viewStyle: {
    justifyContent: 'flex-start',
    alignItems: 'center',
    height: 70,
    position: 'relative',
    flexDirection: 'row',
    margin: 10
  },
  textStyle: {
    color: '#FFFFFF',
    fontSize: 15,
    // justifyContent: 'center',
    alignItems: 'center',
    position: 'absolute',
    fontFamily: 'sansation',
  },
  colorFillStyle: {
    backgroundColor: '#45537A',
    justifyContent: 'flex-end',
    alignItems: 'center',
    height: 50,
    width: "60%",
    position: 'relative',
    flexDirection: 'row',
    paddingLeft: 10
  },
  color2FillStyle: {
    backgroundColor: '#BDBDBD',
    justifyContent: 'flex-end',
    alignItems: 'center',
    height: 50,
    width: "40%",
    position: 'relative',
    flexDirection: 'row',
    paddingRight: 10
  }
});

export default GoalBar;
