import React from 'react';
import { Text, View } from 'react-native';
import ProfileIcon from './ProfileIcon';

const Header = (props) => {
  const { textStyle, iconStyle, viewStyle } = styles;

  return  (
    <View style={viewStyle}>
      <View style={iconStyle}>
        <ProfileIcon />
      </View>
      <Text style={textStyle}>{props.headerText}</Text>
    </View>
  );
};

const styles = {
  viewStyle: {
    backgroundColor: '#76CB89',
    justifyContent: 'center',
    alignItems: 'center',
    height: 70,
    elevation: 2,
    position: 'relative',
    flexDirection: 'row',
    marginBottom: 10
  },
  iconStyle: {
    alignItems: 'flex-start',
    alignSelf: 'center',
    right: 145 // to put to the corner of header
  },
  textStyle: {
    color: '#FFFFFF',
    fontSize: 30,
    justifyContent: 'center',
    alignItems: 'center',
    position: 'absolute',
    fontFamily: 'sansation'
  }
};

export default Header;